<?php
//Explore classes
    class Person {
//        protected $id;
        protected $FirstName;
        protected $LastName;
        protected $BusPhone;
        protected $Email;

//        public function __construct($id, $fname, $lname, $phone, $email) {
        public function __construct($fname, $lname, $phone, $email) {
                //Over-riding default constructor
            $this->id        = NULL;
            $this->FirstName = $fname;
            $this->LastName  = $lname;
            $this->BusPhone  = $phone;
            $this->Email     = $email;          
        }
        public function __toString() {
            return $this->FirstName . " " . $this->LastName;
        }
        public function getAgentId() {
            return $this->id;
        }    
        public function setAgentId ($id) {
            $this->id = $id;
        }
        public function getFirstName() {
            return $this->FirstName;
        }    
        public function setFirstName ($name) {
            $this->FirstName = $name;
        }
        public function getLastName() {
            return $this->LastName;
        }    
        public function setLastName ($name) {
            $this->LastName= $name;
        }
        public function getBusPhone() {
            return $this->BusPhone;
        }    
        public function setBusPhone ($phn) {
            $this->BusPhone= $phn;
        }
        public function getEmail() {
            return $this->Email;
        }    
        public function setEmail ($email) {
            $this->Email= $email;
        }
    }

    class Agent extends Person {
        protected   $MiddleInitial;
        protected   $Position;
        protected   $AgencyId;

        public static   $fieldNames = array("id" => "AgentId", "FirstName" => "AgtFirstName", "MiddleInitial" => "AgtMiddleInitial",
                                "LastName" => "AgtLastName", "BusPhone" => "AgtBusPhone",
                                "Email" => "AgtEmail", "Position" => "AgtPosition", "AgencyId" => "AgencyId");
        public static   $fieldTypes = array("id" => "i", "FirstName" => "s", "MiddleInitial" => "s", "LastName" => "s",
                                 "BusPhone" => "s", "Email" => "s", "Position" => "s", "AgencyId" => "i");
        public function __construct($agent) {//Argument is an associative array of agent data.
//          parent::__construct($agent['AgentId'], $agent['AgtFirstName'], $agent['AgtLastName'], 
            parent::__construct($agent['AgtFirstName'], $agent['AgtLastName'], 
            $agent['AgtBusPhone'], $agent['AgtEmail']);
            $this->MiddleInitial   = $agent['AgtMiddleInitial'];
            $this->Position        = $agent['AgtPosition'];
            $this->AgencyId        = $agent['AgencyId'];
        }
        public function __toString() {
            return $this->id . ", " . $this->FirstName . ", " . $this->MiddleInitial . ", " . $this->LastName
            . ", " . $this->BusPhone . ", " . $this->Email . ", " . $this->Position . ", " . $this->AgencyId;
        }

        public function getTypeString() {
            $temp_str = "";
            $tempArr = get_object_vars($this);
            foreach ($tempArr as $key => $value) {
                $temp_str .= self::$fieldTypes[$key];
            }
            print($temp_str);
            return($temp_str);
        }
        public function buildArray() {
            print("Starting buildArray method. <br>");
            $inputArr = get_object_vars($this);
            return $inputArr;              
        }   
        public function getMiddleInitial() {
            return $this->MiddleInitial;
        }    
        public function setMiddleInitial ($initial) {
            $this->MiddleInitial= $initial;
        }
        public function getAgtPosition() {
            return $this->Position;
        }    
        public function setAgtPosition ($pos) {
            $this->Position = $pos;
        }
        public function getAgencyId() {
            return $this->AgencyId;
        }    
        public function setAgencyId ($id) {
            $this->AgencyId= $id;
        }
    }
    
    class Customer extends Person {
        public      $address;
        protected   $city;
        protected   $province;
        public      $postal;
        public      $country;
        public      $homePhone;
        protected   $agentId;

        public function __construct($id, $fname, $lname, $add, $city, $prov, 
        $post, $country, $hphone, $bphone, $email, $agtId) {
            parent::__construct($id, $fname, $lname, $bphone, $email);
            $this->address   = $add;
            $this->city      = $city;
            $this->province  = $prov;
            $this->country   = $country;
            $this->homePhone = $hphone;  
            $this->agentId   = $agtId;  
        }
        public function getCity() {
            return $this->city;
        }
        public function setCity ($city) {
            $this->city = $city;
        }
        public function getProvince() {
            return $this->province;
        }
        public function setProvince ($prov) {
            $this->province = $prov;
        }
        public function getAgentId() {
            return $this->$agentId;
        }
        public function setAgentId ($id) {
            $this->agentId= $id;
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
            public function setPackageId ($id) {
                $this->PackageId = $id;
            }
            public function getPkgName() {
                return $this->PkgName;
            }    
            public function setPkgName ($pname) {
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
            public function buildArray() {
                $tempArr = get_object_vars($this);
                return $tempArr;              
            }
        }
    
?>