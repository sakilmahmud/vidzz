<?php

// Function to get the next occurrence of a day in the week
function getNextWeekday($day)
{
    $currentDay = date('N');
    $daysUntilNext = ($day - $currentDay + 7) % 7;
    return date('jS F, Y', strtotime("+$daysUntilNext days"));
}

function getNextWeekdayDateFormat($day)
{
    $currentDay = date('N');
    $daysUntilNext = ($day - $currentDay + 7) % 7;
    return date('Y-m-d', strtotime("+$daysUntilNext days"));
}

function getDayNumber($day)
{
    $daysOfWeek = array(
        'sunday' => 0,
        'monday' => 1,
        'tuesday' => 2,
        'wednesday' => 3,
        'thursday' => 4,
        'friday' => 5,
        'saturday' => 6
    );

    $lowercaseDay = strtolower($day);

    return ($daysOfWeek[$lowercaseDay] + 7) % 7; // Adding 7 and taking modulo 7 ensures ascending order
}

function getUserDetails($user_id)
{
    // Fetch user details from the database based on the user_id
    $query = $this->db->get_where('users', ['id' => $user_id]);

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return null;
    }
}

function getDoctorDetails($doctor_id)
{
    // Fetch doctor details from the database based on the doctor_id
    $query = $this->db->get_where('doctor_details', ['user_id' => $doctor_id]);

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return null;
    }
}

function getSetting($setting_name)
{
    // Replace 'settings' with your actual table name for storing settings
    $query = $this->db->get_where('settings', array('setting_name' => $setting_name));
    $setting = $query->row_array();

    // Return the value of the setting if found, otherwise return null
    return isset($setting['setting_value']) ? $setting['setting_value'] : null;
}


function getVideoDetails($videoId)
{
    $api_key = 'AIzaSyBPE-FmgXMz8Q7WK3ZvASI1xipiaqxVPD4';

    $url = 'https://www.googleapis.com/youtube/v3/videos?id=' . $videoId . '&key=' . $api_key . '&part=snippet,contentDetails,statistics,status';

    return $this->makeRequest($url);
}
