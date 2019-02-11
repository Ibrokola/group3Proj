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
    class Package {
        protected $PackageId;
        protected $PkgName;
        protected $PkgStartDate;
        protected $PkgEndDate;
        protected $PkgDesc;
        protected $PkgBasePrice;
        protected $PkgAgencyCommission;

//        public function __construct($id, $fname, $lname, $phone, $email) {
        public function __construct($id, $pname, $pstart, $pend, $pdesc, $pbaseprice, $pcommiss) {
                //Over-riding default constructor
            $this->PackageId            = $id;
            $this->PkgName              = $pname;
            $this->PkgStartDate         = $pstart;
            $this->PkgEndDate           = $pend;
            $this->PkgDesc              = $pdesc;          
            $this->PkgBasePrice         = $pbaseprice;          
            $this->PkgAgencyCommission  = $pcommiss;          
        }
        public function __toString() {
            return $this->PackageId . ", " . $this->PkgName . ", " . $this->PkgStartDate . ", " . $this->PkgEndDate . ", "
            . $this->PkgDesc . ", " . $this->PkgBasePrice . ", " . $this->PkgAgencyCommission;
        }
        public function getPackageId() {
            return $this->PackageId;
        }    
        public function setAgentId ($id) {
            $this->PackageId = $id;
        }
        public function getPackageName() {
            return $this->PkgName;
        }    
        public function setPackageName ($pname) {
            $this->PkgName = $pname;
        }
        public function getPkgStartDate() {
            return $this->PkgStartDate;
        }    
        public function setPkgStartDate ($pstart) {
            $this->PkgStartDate= $pstart;
        }
        public function getPkgEndDate() {
            return $this->PkgEndDate;
        }    
        public function setPkgEndDate ($pend) {
            $this->PkgEndDate= $pend;
        }
        public function getPkgDesc() {
            return $this->PkgDesc;
        }    
        public function setPkgDesc ($pdesc) {
            $this->Email= $pdesc;
        }
        public function getPkgBasePrice() {
            return $this->PkgBasePrice;
        }    
        public function setPkgBasePrice ($pbaseprice) {
            $this->Email= $pbaseprice;
        }
        public function getPkgAgencyCommission() {
            return $this->PkgAgencyCommission;
        }    
        public function setPkgAgencyCommission ($pcommiss) {
            $this->PkgAgencyCommission= $pcommiss;
        }
    }

?>