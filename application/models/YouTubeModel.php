<?php
defined('BASEPATH') or exit('No direct script access allowed');

class YouTubeModel extends CI_Model
{

    private $api_key = 'AIzaSyBPE-FmgXMz8Q7WK3ZvASI1xipiaqxVPD4';

    public function getVideoDetails($videoId)
    {
        //$url = 'https://www.googleapis.com/youtube/v3/videos?id=' . $videoId . '&key=' . $this->api_key . '&part=snippet,contentDetails,fileDetails,liveStreamingDetails,localizations,player,processingDetails,recordingDetails,statistics,status,suggestions,topicDetails';

        $url = 'https://www.googleapis.com/youtube/v3/videos?id=' . $videoId . '&key=' . $this->api_key . '&part=snippet,contentDetails,statistics,status';

        return $this->makeRequest($url);
    }

    public function getChannelDetails($channelId)
    {
        $url = 'https://www.googleapis.com/youtube/v3/channels?id=' . $channelId . '&key=' . $this->api_key . '&part=snippet,contentDetails,statistics';
        return $this->makeRequest($url);
    }

    private function makeRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }
}
