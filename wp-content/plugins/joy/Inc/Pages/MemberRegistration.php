<?php

/**
 * @package Joy
 */

namespace Inc\Pages;

class MemberRegistration{
    public function registermember(){
        $this->create_table_to_db();
        $this->add_member_to_db();
    }

    function create_table_to_db(){
        global $wpdb;

        $table_name = $wpdb->prefix . 'members';

        $members_details = "CREATE TABLE IF NOT EXISTS " . $table_name . "(
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            full_name text NOT NULL,
            phone_number text NOT NULL,
            email text NOT NULL,
            programming_language text NOT NULL
            cohort_number text NOT NULL,
        );";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($members_details);
    }

    function add_member_to_db(){
        if (isset($_POST['submitbtn'])) {

            $data = [
                'full_name' => $_POST['full_name'],
                'phone_number' => $_POST['phone_number'],
                'email' => $_POST['email'],
                'programming_language' => $_POST['programming_language'],
                'cohort_number' => $_POST['cohort_number'],
            ];


            global $wpdb;

            $table_name = $wpdb->prefix . 'members';

            $result = $wpdb->insert($table_name, $data, $format = NULL);

            if ($result == true) {
                echo "<script> alert('Member added successfully!');</script>";

                $data['full_name'] = '';
                $data['phone_number'] = '';
                $data['email'] = '';
                $data['programming_language'] = '';
                $data['cohort_number'] = '';
            } else {
                echo "<script>alert('Member not added!');</script>";
            }
        }
    }
}

?>