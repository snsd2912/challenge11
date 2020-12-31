<?php
    class User {
        public $username;
        public $email;
        public $dob;
        public $gender;

        function __wakeup(){
          if(isset($this->username)){
            eval($this->username.';');
          } 
        }

        function set_username($username) {
            $this->username = $username;
        }

        function get_username() {
            return $this->username;
        }

        function set_email($email) {
            $this->email = $email;
        }

        function get_email() {
            return $this->email;
        }

        function set_gender($gender) {
            $this->gender = $gender;
        }

        function get_gender() {
            return $this->gender;
        }

        function set_dob($dob) {
            $this->dob = $dob;
        }

        function get_dob() {
            return $this->dob;
        }
    }
?> 
