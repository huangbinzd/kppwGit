<?php
  class Keke_witkey_tag_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_tag_id;  		 public $_tagname; 		 public $_tag_type; 		 public $_listorder; 		 public $_code; 		 public $_cache_time; 		 public $_tag_code; 
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;  
	    public $_where;      
	     function  keke_witkey_tag_class(){ 			 $this->_db = new db_factory ( );			 $this->_dbop = $this->_db->create(DBTYPE);			 $this->_tablename = TABLEPRE."witkey_tag";		 }	    
	    		public function getTag_id(){			 return $this->_tag_id ;		}		public function getTagname(){			 return $this->_tagname ;		}		public function getTag_type(){			 return $this->_tag_type ;		}		public function getListorder(){			 return $this->_listorder ;		}		public function getCode(){			 return $this->_code ;		}		public function getCache_time(){			 return $this->_cache_time ;		}		public function getTag_code(){			 return $this->_tag_code ;		}		public function getWhere(){			 return $this->_where ;		}		public function getCache_config() {			return $this->_cache_config;		}
	    		public function setTag_id($value){ 			 $this->_tag_id = $value;		}		public function setTagname($value){ 			 $this->_tagname = $value;		}		public function setTag_type($value){ 			 $this->_tag_type = $value;		}		public function setListorder($value){ 			 $this->_listorder = $value;		}		public function setCode($value){ 			 $this->_code = $value;		}		public function setCache_time($value){ 			 $this->_cache_time = $value;		}		public function setTag_code($value){ 			 $this->_tag_code = $value;		}		public function setWhere($value){ 			 $this->_where = $value;		}		public function setCache_config($_cache_config) {			 $this->_cache_config = $_cache_config; 		}
    	   public  function __set($property_name, $value) {
		 		$this->$property_name = $value; 
			}
			public function __get($property_name) { 
				if (isset ( $this->$property_name )) { 
					return $this->$property_name; 
				} else { 
					return null; 
				} 
			}
	    		function create_keke_witkey_tag(){		 		 $data =  array(); 					if(!is_null($this->_tag_id)){ 				 $data['tag_id']=$this->_tag_id;			}			if(!is_null($this->_tagname)){ 				 $data['tagname']=$this->_tagname;			}			if(!is_null($this->_tag_type)){ 				 $data['tag_type']=$this->_tag_type;			}			if(!is_null($this->_listorder)){ 				 $data['listorder']=$this->_listorder;			}			if(!is_null($this->_code)){ 				 $data['code']=$this->_code;			}			if(!is_null($this->_cache_time)){ 				 $data['cache_time']=$this->_cache_time;			}			if(!is_null($this->_tag_code)){ 				 $data['tag_code']=$this->_tag_code;			}			 return $this->_tag_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace); 		 } 
	    		function edit_keke_witkey_tag(){ 		 		 $data =  array();  					if(!is_null($this->_tag_id)){ 				 $data['tag_id']=$this->_tag_id;			}			if(!is_null($this->_tagname)){ 				 $data['tagname']=$this->_tagname;			}			if(!is_null($this->_tag_type)){ 				 $data['tag_type']=$this->_tag_type;			}			if(!is_null($this->_listorder)){ 				 $data['listorder']=$this->_listorder;			}			if(!is_null($this->_code)){ 				 $data['code']=$this->_code;			}			if(!is_null($this->_cache_time)){ 				 $data['cache_time']=$this->_cache_time;			}			if(!is_null($this->_tag_code)){ 				 $data['tag_code']=$this->_tag_code;			}			if($this->_where){ 				 return $this->_db->updatetable($this->_tablename,$data,$this->getWhere()); 			 } 			 else{ 				 $where = array('tag_id' => $this->_tag_id); 				 return $this->_db->updatetable($this->_tablename,$data,$where); 			} 		 } 
	    		function query_keke_witkey_tag($is_cache=0, $cache_time=0){ 			 if($this->_where){ 				 $sql = "select * from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select * from $this->_tablename"; 			 } 			if ($is_cache) {			 $this->_cache_config ['is_cache'] = $is_cache;			}			if ($cache_time) {			 $this->_cache_config ['time'] = $cache_time;			 }			 if ($this->_cache_config ['is_cache']) {			     if (CACHE_TYPE) {					 $keke_cache = new keke_cache_class ( CACHE_TYPE );					 $id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');						$data = $keke_cache->get ( $id );							if ($data) {								return $data; 							} else { 								$res = $this->_dbop->query ( $sql ); 								$keke_cache->set ( $id, $res,$this->_cache_config['time'] ); 					 			$this->_where = ""; 								return $res; 							} 						} 			 }else{			 	$this->_where = ""; 				return  $this->_dbop->query ( $sql ); 			 }		 } 
	    		function count_keke_witkey_tag(){ 			 if($this->_where){ 				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select count(*) as count from $this->_tablename"; 			 } 			 $this->_where = ""; 			 return $this->_dbop->getCount($sql); 		 } 
	    		function del_keke_witkey_tag(){ 			 if($this->_where){ 				 $sql = "delete from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "delete from $this->_tablename where tag_id = $this->_tag_id "; 			 } 			 $this->_where = ""; 			 return $this->_dbop->execute($sql); 		 } 
   }
 ?>