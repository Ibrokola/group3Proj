<?php 

    class Person {
        public $id;
        public $firstName;
        public $lastName;
        public $busPhone;
        public $email;

        public function __contruct($id, $fname, $lname, $phone, $email){
            $this->id = $id;
            $this->firstName = $fname;
            $this->lastName = $lname;
            $this->busPhone = $phone;
            $this->email = $email;
        }

        public function __toString() {
            return $this->firstName . " " . $this->lastName;
        }
    }

    class Customer extends Person {
        public $address;
        public $city;
        public $province;
        public $postal;
        public $country;
        public $homePhone;
        public $agentId;

        public function __contruct($id, $fname, $lname, $phone, $email, $add, $city, $prov, $post, $country, $hphone, $agtId) {
            
            parent::__contruct($id, $fname, $lname, $bphone, $email);

            $this->address = $add;
            $this->city = $city;
            $this->province = $prov;
            $this->postal = $post;
            $this->country = $country;
            $this->$homePhone = $hphone;
            $this->agentId = $agtId;

        }
        
    }

?>