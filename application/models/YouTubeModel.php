<?php
defined('BASEPATH') or exit('No direct script access allowed');

class YouTubeModel extends CI_Model
{

    private $api_key = 'AIzaSyBPE-FmgXMz8Q7WK3ZvASI1xipiaqxVPD4';

    public function getVideoDetails($videoId)
    {
        $url = 'https://www.googleapis.com/youtube/v3/videos?id=' . $videoId . '&key=' . $this->api_key . '&part=snippet,contentDetails,statistics,status';
        return $this->makeRequest($url);
    }

    public function getChannelDetails($channelId)
    {
        $url = 'https://www.googleapis.com/youtube/v3/channels?id=' . $channelId . '&key=' . $this->api_key . '&part=snippet,contentDetails,statistics';
        return $this->makeRequest($url);
    }

    public function getLatestVideos($channelId, $maxResults = 4)
    {
        $url = 'https://www.googleapis.com/youtube/v3/search?channelId=' . $channelId . '&key=' . $this->api_key . '&part=snippet&order=date&type=video&maxResults=' . $maxResults;
        return $this->makeRequest($url);
    }

    public function getChannelIdByQuery($query)
    {
        $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . urlencode($query) . '&type=channel&key=' . $this->api_key;
        $response = $this->makeRequest($url);
        /* print_r($response);
        die; */
        if (!empty($response['items']) && isset($response['items'][0]['id']['channelId'])) {
            return $response['items'][0]['id']['channelId'];
        }

        return null; // Return null if the channel ID is not found
    }

    public function getChannelIdByUser($username)
    {
        // Construct the API URL
        $url = 'https://www.googleapis.com/youtube/v3/channels?forUsername=' . $username . '&key=' . $this->api_key . '&part=id';

        // Make the API request
        $response = $this->makeRequest($url);

        // Uncomment the following line for debugging
        //print_r($response);

        // Check if the response contains items and return the channel ID
        if (!empty($response['items']) && isset($response['items'][0]['id'])) {
            return $response['items'][0]['id'];
        }

        // Return null if the channel ID is not found or if an error occurred
        return null;
    }

    // Example of the makeRequest function
    private function makeRequest($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        // Check if the request was successful
        if ($httpCode == 200) {
            return json_decode($result, true); // Decode the JSON response into an associative array
        } else {
            // Log the error or handle it as needed
            return ['error' => 'Failed to fetch data from YouTube API.'];
        }
    }

    public function extractVideoIdOrChannelId($url)
    {
        $parsedUrl = parse_url($url);

        // Check if the URL is a video link
        if (isset($parsedUrl['query']) && strpos($parsedUrl['path'], 'watch') !== false) {
            parse_str($parsedUrl['query'], $params);
            return ['type' => 'video', 'id' => $params['v'] ?? null];
        }

        // Check if the URL is a channel link (e.g., /channel/UC_x5XG1OV2P6uZZ5FSM9Ttw)
        if (strpos($parsedUrl['path'], '/channel/') !== false) {
            $channelId = str_replace('/channel/', '', $parsedUrl['path']);
            return ['type' => 'channel', 'id' => $channelId];
        }

        // Check if the URL is a username-based channel page (e.g., /@warikoo)
        if (strpos($parsedUrl['path'], '@') !== false) {
            $username = ltrim($parsedUrl['path'], '/@');
            //$channelId = $this->getChannelIdByUser($username);
            $channelId = $this->getChannelIdByQuery($username);
            return ['type' => 'channel', 'id' => $channelId];
        }

        // Check if the URL is a user's channel page (e.g., /user/username)
        if (strpos($parsedUrl['path'], '/user/') !== false) {
            $username = str_replace('/user/', '', $parsedUrl['path']);
            $channelId = $this->getChannelIdByUser($username);
            return ['type' => 'channel', 'id' => $channelId];
        }

        return null; // Return null if no valid ID is found
    }


    /* private function makeRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    } */
}
