<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function addUser($userData)
    {
        // Insert the patient's data into the 'users' table
        $this->db->insert('users', $userData);

        // Get the inserted patient's ID
        $patientId = $this->db->insert_id();
        return $patientId;
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

    public function getDoctors($status = "")
    {

        // Logic for retrieving a doctor from the database based on the doctorId
        $this->db->select('users.*, doctor_details.degree, doctor_details.specialist, doctor_details.availability, doctor_details.photo, doctor_details.banner_photo');
        $this->db->from('users');
        $this->db->join('doctor_details', 'users.id = doctor_details.user_id', 'left');
        $this->db->where('users.user_role', 2);
        if ($status != "") {
            $this->db->where('users.status', $status);
        }

        // Add ORDER BY clause to sort by booking date in descending order
        $this->db->order_by('users.id', 'desc');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function addDoctor($data)
    {

        // Prepare data for 'users' table
        $usersTableData = array(
            'user_role' => 2,
            'username' => $data['username'],
            'full_name' => $data['full_name'],
            'mobile' => $data['mobile'],
            'password' => $data['password']
        );

        // Logic for adding a new doctor to the database
        $this->db->insert('users', $usersTableData);

        // Get the inserted doctor's ID
        $doctorId = $this->db->insert_id();

        // Prepare data for 'doctor_details' table
        $doctorDetailsData = array(
            'user_id' => $doctorId,
            'degree' => $data['degree'], // Replace 'degree' with the actual form field name for the doctor's degree
            'specialist' => $data['specialist'], // Replace 'specialist' with the actual form field name for the doctor's specialist
            'availability' => implode(',', $data['availability']), // Replace 'availability' with the actual form field name for the doctor's availability
            'photo' => $data['photo'], // Replace this with the actual path to the uploaded doctor's photo
            'banner_photo' => $data['banner_photo'], // Replace this with the actual path to the uploaded doctor's photo
            // Add other relevant data
        );

        // Insert the doctor details into the 'doctor_details' table
        $this->db->insert('doctor_details', $doctorDetailsData);
    }

    public function updateDoctor($doctorId, $data)
    {

        // Prepare data for 'users' table
        $usersTableData = array(
            'username' => $data['username'],
            'full_name' => $data['full_name'],
            'mobile' => $data['mobile']
        );

        // Logic for updating a doctor in the database
        $this->db->where('id', $doctorId);
        $this->db->update('users', $usersTableData);

        // Prepare data for 'doctor_details' table update
        $doctorDetailsData = array(
            'user_id' => $doctorId,
            'degree' => $data['degree'], // Replace 'degree' with the actual form field name for the doctor's degree
            'specialist' => $data['specialist'], // Replace 'specialist' with the actual form field name for the doctor's specialist
            'availability' => implode(',', $data['availability']), // Replace 'availability' with the actual form field name for the doctor's availability
            'photo' => $data['photo'], // Replace this with the actual path to the uploaded doctor's photo
            'banner_photo' => $data['banner_photo'], // Replace this with the actual path to the uploaded doctor's photo
            // Add other relevant data
        );

        // Update the doctor details in the 'doctor_details' table
        $this->db->where('user_id', $doctorId);
        $this->db->update('doctor_details', $doctorDetailsData);
    }

    public function getDoctorById($doctorId)
    {
        // Logic for retrieving a doctor from the database based on the doctorId
        $this->db->select('users.*, doctor_details.degree, doctor_details.specialist, doctor_details.availability, doctor_details.photo, doctor_details.banner_photo');
        $this->db->from('users');
        $this->db->join('doctor_details', 'users.id = doctor_details.user_id', 'left');
        $this->db->where('users.id', $doctorId);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function deleteDoctor($doctorId)
    {
        // Logic for deleting a doctor from the database based on the doctorId

        // Delete the doctor details from the 'doctor_details' table
        $this->db->where('user_id', $doctorId);
        $this->db->delete('doctor_details');

        // Delete the doctor from the 'users' table
        $this->db->where('id', $doctorId);
        $this->db->delete('users');
    }

    public function getPatients($added_by = "")
    {
        $this->db->select('patients.*, IF(patients.added_by = 0, "Self", users.full_name) AS added_by_name');
        $this->db->select('CONCAT("AP", LPAD(patients.id, 5, "0")) AS card_number', FALSE); // Generate the card number
        $this->db->from('users AS patients');
        $this->db->join('users', 'patients.added_by = users.id', 'left');
        $this->db->where('patients.user_role', 3); // Assuming user_role 3 represents patients

        if ($added_by != "") {
            $this->db->where('patients.added_by', $added_by);
        }
        // Add ORDER BY clause to sort by booking date in descending order
        $this->db->order_by('patients.id', 'desc');
        $query = $this->db->get();
        //echo $this->db->last_query(); die;

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }


    public function addPatient($data)
    {
        // Logic for adding a new patient to the database
        $data['user_role'] = 3; // Set the user role as "patient"
        $this->db->insert('users', $data);
    }

    public function updatePatient($patientId, $data)
    {
        // Logic for updating a patient in the database
        $this->db->where('id', $patientId);
        $this->db->update('users', $data);
    }

    public function getPatientById($patientId)
    {
        // Logic for retrieving a patient from the database based on the patientId
        $query = $this->db->get_where('users', array('id' => $patientId));
        return $query->row_array();
    }

    public function deletePatient($patientId)
    {
        // Logic for deleting a patient from the database based on the patientId
        $this->db->where('id', $patientId);
        $this->db->delete('users');
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
}
