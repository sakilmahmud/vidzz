<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function insert_user($userData)
    {
        // Insert the patient's data into the 'users' table
        $this->db->insert('users', $userData);

        // Get the inserted patient's ID
        return $this->db->insert_id();
    }

    public function getUserById($user_id)
    {
        // Logic for retrieving a user from the database based on the user_id
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function updateUser($user_id, $userData, $addressData = null)
    {
        $this->db->trans_start();

        // Update user data
        $this->db->where('id', $user_id);
        $this->db->update('users', $userData);

        // Check if address data is provided
        if ($addressData !== null) {
            // Check if the user already has an address
            $existingAddress = $this->db->get_where('addresses', array('user_id' => $user_id))->row_array();

            if (empty($existingAddress)) {
                // User doesn't have an address, so add a new one
                $this->addAddress($user_id, $addressData);
            } else {
                // User has an existing address, so update it
                $this->updateAddress($user_id, $addressData);
            }
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function deleteUser($user_id)
    {
        $this->db->trans_start();

        // Delete the user from the 'users' table
        $this->db->where('id', $user_id);
        $this->db->delete('users');

        // Delete the associated address from the 'addresses' table
        $this->deleteAddress($user_id);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function deleteAddress($user_id)
    {
        // Delete the address from the 'addresses' table based on user_id
        $this->db->where('user_id', $user_id);
        $this->db->delete('addresses');
    }


    public function getAddressByUserId($user_id)
    {
        $this->db->select('*');
        $this->db->from('addresses');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function addAddress($user_id, $data)
    {
        $this->db->set('user_id', $user_id);
        $this->db->insert('addresses', $data);

        return $this->db->insert_id();
    }


    public function updateAddress($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('addresses', $data);

        return $this->db->affected_rows() > 0;
    }


    public function createPatient($userData)
    {
        // Insert the patient's data into the 'users' table
        $this->db->insert('users', $userData);

        // Get the inserted patient's ID
        $patientId = $this->db->insert_id();

        return $patientId;
    }

    public function getUserByUsername($username)
    {
        // Replace 'users' with your actual table name for storing user data
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row_array();
    }

    public function getUsersWithAddresses($role)
    {
        // Logic for retrieving premium users with their addresses
        $this->db->select('users.*, addresses.address, addresses.city, addresses.pincode');
        $this->db->from('users');
        $this->db->where('user_role', $role);
        $this->db->join('addresses', 'users.id = addresses.user_id', 'left');
        $query = $this->db->get();

        return $query->result_array();
    }


    public function getUserByUsernameOrMobileOrEmail($usernameOrMobileOrEmail)
    {
        // Replace 'users' with your actual table name for storing user data
        $this->db->where('username', $usernameOrMobileOrEmail);
        $this->db->or_where('mobile', $usernameOrMobileOrEmail);
        $this->db->or_where('email', $usernameOrMobileOrEmail);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function getUsers($role_id = "", $added_by = "")
    {
        /** user roles 
            1 = Super Admin
            2 = Doctors
            3 = Patients 
            4 = Half Doctors 
            5 = Other Admin
            6 = Customers
        user roles */
        // Fetch the users from the database
        $this->db->select('*');
        $this->db->from('users');
        if ($role_id != "") {
            $this->db->where('user_role', $role_id);
        }
        if ($added_by != "") {
            $this->db->where('added_by', $added_by);
        }
        // Add ORDER BY clause to sort by booking date in descending order
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function isUsernameUnique($username, $userId)
    {
        // Check if the username exists in the database for any user except the current user
        $this->db->where('username', $username);
        $this->db->where('id !=', $userId);
        $query = $this->db->get('users');

        // Print the executed query
        //echo $this->db->last_query(); die;

        return ($query->num_rows() === 0);
    }

    public function isMobileUnique($mobile, $userId)
    {
        // Check if the mobile number exists in the database for any user except the current userc
        $this->db->where('mobile', $mobile);
        $this->db->where('id !=', $userId);
        $query = $this->db->get('users');

        return ($query->num_rows() === 0);
    }
    public function isMobileUniqueonRegister($mobile)
    {
        $this->db->where('mobile', $mobile);
        $query = $this->db->get('users');
        return $query->num_rows() == 0;
    }

    public function getUsersByRoleId($role_id)
    {
        // Method to fetch users based on their role ID
        $this->db->where('user_role', $role_id);
        return $this->db->get('users')->result_array();
    }

    public function updatePassword($user_id, $hashed_password)
    {
        $data = array(
            'password' => $hashed_password
        );

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        return $this->db->affected_rows() > 0;
    }


    public function get_user_by_id($user_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update_user($user_id, $data)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    public function getUserByToken($token)
    {
        return $this->db->get_where('users', ['verification_token' => $token])->row_array();
    }

    public function verifyUser($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->update('users', ['is_verified' => 1, 'verification_token' => null]);
    }

    public function checkUser($data)
    {
        $this->db->where('oauth_provider', $data['oauth_provider']);
        $this->db->where('oauth_uid', $data['oauth_uid']);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function getUserListWithDetails()
    {
        // Select required fields and concatenate first name and last name
        $this->db->select('*, CONCAT(first_name, " ", last_name) as full_name');
        $this->db->from('users');
        $this->db->where('status !=', 3); // Exclude deleted users
        $this->db->where('user_role !=', 1); // Exclude admin users
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserByEmail($email)
    {
        return $this->db->where('email', $email)->get('users')->row_array();
    }

    public function savePasswordResetToken($user_id, $token)
    {
        $this->db->where('id', $user_id)->update('users', ['reset_token' => $token, 'token_created_at' => date('Y-m-d H:i:s')]);
    }

    public function getUserByResetToken($token)
    {
        // Ensure the token is sanitized
        $token = trim($token);

        // Build the query
        $this->db->where('reset_token', $token);
        //$this->db->where('token_created_at >=', date('Y-m-d H:i:s', strtotime('-1 hour')));
        $query = $this->db->get('users');

        // Debugging: Log the last query
        log_message('debug', 'Last Query: ' . $this->db->last_query());

        return $query->row_array();
    }


    /* public function updatePassword($user_id, $new_password)
    {
        $this->db->where('id', $user_id)->update('users', ['password' => $new_password]);
    } */

    public function clearPasswordResetToken($user_id)
    {
        $this->db->where('id', $user_id)->update('users', ['reset_token' => null, 'token_created_at' => null]);
    }
}
