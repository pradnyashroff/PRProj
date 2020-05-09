<?php
class LMSModel extends CI_Model 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }
	// profile pic 
	public function profile_pic_fetch($emp_code)
	{
		$condition = "emp_code =" . "'" . $emp_code . "' ";
		$this->db->select('*');
		$this->db->from('employee_master');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) 
		{
			return $query;
		} 
		else 
		{
			return false;
		}
	}
	public function fetch_dept_nm($dept_id) 
	{
		$condition = "dept_code =" . "'" . $dept_id . "'";
        $this->db->select('dept_name');
        $this->db->from('department_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->dept_name;
        } else {
            return false;
        }
    }
    public function fetch_emp_nm($emp_code) 
	{
		$condition = "emp_code =" . "'" . $emp_code . "'";
        $this->db->select('emp_name');
        $this->db->from('employee_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_name;
        } else {
            return false;
        }
    }
    public function fetch_book_nm($book_id) 
	{
		$condition = "book_id =" . "'" . $book_id . "'";
        $this->db->select('book_name');
        $this->db->from('lms_book_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->book_name;
        } else {
            return false;
        }
    }

	public function fetch_plant_nm($plant_id) 
	{
		$condition = "plant_code =" . "'" . $plant_id . "'";
        $this->db->select('plant_name');
        $this->db->from('plant_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->plant_name;
        } else {
            return false;
        }
    }
    public function fetch_plant($emp_code) 
	{
		$condition = "emp_code =" . "'" . $emp_code . "'";
        $this->db->select('plant_code');
        $this->db->from('employee_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->plant_code;
        } else {
            return false;
        }
    }
    public function fetch_dept_code($emp_code) 
	{
		$condition = "emp_code =" . "'" . $emp_code . "'";
        $this->db->select('emp_dept');
        $this->db->from('employee_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_dept;
        } else {
            return false;
        }
    }
	public function plant_list() 
	{
		$this->db->select('*');
		$this->db->from('plant_master');
		$query = $this->db->get();
		if ($query->num_rows() >= 1) 
		{
			return $query;
		}
		else 
		{
			return false;
		}
	}

	//Admin 03/04/2020

	public function book_category() {
		$this->db->select('*');
		$this->db->from('lms_cate_mst');
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function book_Name() {
		$condition = "book_type = 'Book' ";
		$this->db->select('*');
		$this->db->from('lms_book_mst');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function totalBookCount($book_id) {
		$condition = "book_stok_stus = 1  and book_id =" . "'" . $book_id . "'";
		$this->db->select('*');
		$this->db->from('lms_book_stock');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}

	public function fetchBookDetails($book_id) {
		$condition = "lbm.book_id = lbs.book_id AND lbm.cat_id = lcm.cat_id And lbs.book_stok_stus=1 AND lbm.book_id =" . "'" . $book_id . "'";
		$this->db->select('lbm.book_id,lbm.book_price,lbm.book_name,lbs.total_book,lcm.cat_name,lbm.autho_name,lbm.book_tumbnel,lbm.publisher,lbm.edition,lbs.total_book');
		$this->db->from('lms_book_mst lbm,lms_book_stock lbs,lms_cate_mst lcm');
		$this->db->where($condition);
		$this->db->order_by("book_id", "asc");
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function BookDetails($book_id) {
		$condition = "book_id =" . "'" . $book_id . "'";
		$this->db->select('*');
		$this->db->from('lms_book_mst');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function totalBook($book_id) {
		$condition = "book_stok_stus=1 and book_id =" . "'" . $book_id . "'";
		$this->db->select('*');
		$this->db->from('lms_book_stock');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function InStockBook($Stock_id) {
		// $condition = "book_stok_id =" . "'" . $Stock_id . "' ORDER BY book_tran_id DESC LIMIT 0, 1 ";
		$condition = "lbs.book_stock_id=lbt.book_stok_id AND book_stok_id =" . "'" . $Stock_id . "' ORDER BY `book_tran_id` DESC LIMIT 0, 1 ";
		$this->db->select('*');
		$this->db->from('lms_book_transac lbt,lms_book_stock lbs ');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function StockQuantity($book_id) {
		// $condition = "book_stok_id =" . "'" . $Stock_id . "' ORDER BY book_tran_id DESC LIMIT 0, 1 ";

		$condition = "book_stok_stus=0 and book_id =" . "'" . $book_id . "' ORDER BY `book_stock_id` DESC LIMIT 0, 1";
		$this->db->select('*');
		$this->db->from('lms_book_stock');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function oldBookOutstanding($book_id) {
		$condition = "lbt.book_stok_id=lbs.book_stock_id AND lbs.book_id=lot.book_id AND lbs.book_stok_stus=0 AND lbs.book_id =" . "'" . $book_id . "'  ORDER BY `book_tran_id` DESC LIMIT 1";
		$this->db->select('*');
		$this->db->from('lms_book_transac lbt,lms_book_stock lbs,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function oldStockID($book_id) {
		$condition = "lbt.book_stok_id=lbs.book_stock_id AND lbs.book_id=lot.book_id AND lbs.book_id =" . "'" . $book_id . "'  ORDER BY `book_tran_id` DESC LIMIT 1";
		$this->db->select('*');
		$this->db->from('lms_book_transac lbt,lms_book_stock lbs,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function totakBookCount() {
		$condition = "book_stok_stus = 1";
		$this->db->select('*');
		$this->db->from('lms_book_stock');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function Admin_Stock_Fetch($book_id) {
		$condition = "book_id =" . "'" . $book_id . "'";
		$this->db->select('*');
		$this->db->from('lms_book_mst');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function Admin_Stock_Total_Book() {
		$condition = "lbm.book_id=lbs.book_id AND lbm.book_status=1 AND  lbs.book_stok_stus=1";
		$this->db->select('*');
		$this->db->from('lms_book_mst lbm,lms_book_stock lbs');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantOne() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND plant_code=1001";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantTwo() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND plant_code=1002";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantThree() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND plant_code=1003";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantFour() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND (em.plant_code=10040 OR em.plant_code=1004)";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantFive() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND plant_code=1005";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantSix() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND plant_code=1006";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantSeven() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND plant_code=1007";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantEight() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND plant_code=1008";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantNine() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND plant_code=1009";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function Admin_Total_Book_plantTen() {
		$condition = "em.emp_code=lot.order_by And lot.order_status=1 AND plant_code=1010";
		$this->db->select('*');
		$this->db->from('employee_master em,lms_order_trans lot');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
		
		
	}
	public function E_BookTblDetails() {
		$condition = "book_type='E-Book'";
		$this->db->select('*');
		$this->db->from('lms_book_mst');
		$this->db->where($condition);
		$this->db->order_by("book_id", "asc");
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function Admin_Avilable_Book() {
		$condition = "lbm.book_id = lbs.book_id AND lbs.book_stock_id=lbt.book_stok_id and lbs.book_stok_stus=1 AND lbm.book_type='Book' AND lbt.in_stock!=0";
		$this->db->select('*');
		$this->db->from('lms_book_mst lbm,lms_book_stock lbs,lms_book_transac lbt');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function Admin_Total_Book() {
		$condition = "book_status=1 and book_type='Book'";
		$this->db->select('*');
		$this->db->from('lms_book_mst');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function E_BookCount() {
		$condition = "book_status=1 AND book_type='E-Book'";
		$this->db->select('*');
		$this->db->from('lms_book_mst');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function admin_pending_book_count($emp_code) {
		$condition = "order_status=0 and allocate_to_person =" . "'" . $emp_code . "'";
		$this->db->select('*');
		$this->db->from('lms_order_trans');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function admin_Given_book_count($emp_code) {
		$condition = "order_status=1 and allocate_to_person =" . "'" . $emp_code . "'";
		$this->db->select('*');
		$this->db->from('lms_order_trans');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function issuedBook($emp_code) {
		$condition = "order_status=1 and order_by =" . "'" . $emp_code . "'";
		$this->db->select('*');
		$this->db->from('lms_order_trans');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function BookHistoryDetails($emp_code) {
		$condition = "order_by =" . "'" . $emp_code . "'";
		$this->db->select('*');
		$this->db->from('lms_order_trans');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function ReturnBookDetails($emp_code) {
		$condition = "order_status=2 and order_by =" . "'" . $emp_code . "'";
		$this->db->select('*');
		$this->db->from('lms_order_trans');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function bookOverDueDate() {
		$condition = "order_status=1";
		$this->db->select('*');
		$this->db->from('lms_order_trans');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function pendingBook($emp_code) {
		$condition = "order_status=0 and order_by =" . "'" . $emp_code . "'";
		$this->db->select('*');
		$this->db->from('lms_order_trans');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}

	public function RejectBook($emp_code) {
		$condition = "order_status=4 and order_by =" . "'" . $emp_code . "'";
		$this->db->select('*');
		$this->db->from('lms_order_trans');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function AdminRejectBook() {
		$condition = "order_status=4 ";
		$this->db->select('*');
		$this->db->from('lms_order_trans');
		$this->db->where($condition);
		
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function Adminmanage_cate() {
		$condition = "cat_status=1";
		$this->db->select('*');
		$this->db->from('lms_cate_mst');
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function editBookDetails($data, $bookId) {
        $this->db->where('book_id', $bookId);
        $this->db->update('lms_book_mst',$data);
        }
	public function addQuantity($id)
	{
		$condition = "book_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('lms_book_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	 public function AdminBookDtl($id)
	{
		$condition = "book_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('lms_book_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
	public function totalQuantity($id)
	{
		$condition = "book_stok_stus=1 and book_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('lms_book_stock');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
			return $query;
		} 
		else {
			return false;
		}
	}
	public function editBookCate($data, $cateId) {
        $this->db->where('cat_id', $cateId);
        $this->db->update('lms_cate_mst',$data);
        }
        public function updateOrderTran($data,$order_id) {
        $this->db->where('order_id', $order_id);
        $this->db->update('lms_order_trans',$data);
        }
        public function updateOrderReject($data4,$order_id) {
        $this->db->where('order_id', $order_id);
        $this->db->update('lms_order_trans',$data4);
        }
        public function updateOrderTranretun($data,$order_id) {
        $this->db->where('order_id', $order_id);
        $this->db->update('lms_order_trans',$data);
        }
        public function updateRenewDate($data4,$order_id) {
        $this->db->where('order_id', $order_id);
        $this->db->update('lms_order_trans',$data4);
        }
         public function updateBooktranissuedBook($data2,$order_id) {
        $this->db->where('order_id', $order_id);
        $this->db->update('lms_book_transac',$data2);
        }
         public function updateBookStockissued($data3,$stock_Id) {
        $this->db->where('book_stock_id', $stock_Id);
        $this->db->update('lms_book_stock',$data3);
        }
         public function updateOrderTranDueDate($data4,$order_id) {
        $this->db->where('order_id', $order_id);
        $this->db->update('lms_order_trans',$data4);
        }
        public function updateBookTran($data2,$stock_Id) {
        $this->db->where('book_tran_id', $stock_Id);
        $this->db->update('lms_book_transac',$data2);
        }
        public function AcceptRequest($data2) {
        $this->load->database();
        $this->db->insert('lms_book_transac', $data2);
    }

        
	public function EditCate($id)
	{
		$condition = "cat_status=1 and cat_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('lms_cate_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
	 public function addBook($data) {
        $this->load->database();
        $this->db->insert('lms_book_mst', $data);
    }
    public function addBookCate($data) {
        $this->load->database();
        $this->db->insert('lms_cate_mst', $data);
    }
    public function sendRequest($data) {
        $this->load->database();
        $this->db->insert('lms_order_trans', $data);
    }
    public function addBookQuantity($data) {
        $this->load->database();
        $this->db->insert('lms_book_stock', $data);
    }
    public function updateBookStatus($data1,$book_id) {
        $this->db->where('book_id', $book_id);
        $this->db->update('lms_book_stock',$data1);
        }
	 public function RequestBookDetail($order_id) {
        $condition = "order_id =" . "'" . $order_id . "'";

        $this->db->select('*');
        $this->db->from('lms_order_trans');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    public function viewBookDetails($id)
	{
		$condition = "book_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('lms_book_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
	function PlantWiseReport(){
    	$condition = "em.emp_code=lot.order_by AND em.plant_code=p.plant_id AND lot.order_status=1";
        $this->db->select('plant_name, count(lot.order_id) as order_id ');
        $this->db->from('lms_order_trans lot,employee_master em,plants p');
        $this->db->where($condition);
        $this->db->group_by("plant_code");
         $query = $this->db->get();
        return $query->result_array();

 
    }
    function DueDateWiseReport(){
    	$condition = "em.emp_code=lot.order_by AND CURRENT_DATE() > book_due_date AND em.plant_code=p.plant_id AND lot.order_status=1";
        $this->db->select('plant_name, count(lot.order_id) as order_id ');
        $this->db->from('lms_order_trans lot,employee_master em,plants p');
        $this->db->where($condition);
        $this->db->group_by("plant_code");
         $query = $this->db->get();
        return $query->result_array();

 
    }
     function plantWiseBookRequest(){
    	$condition = "em.emp_code=lot.order_by AND em.plant_code=p.plant_id AND lot.order_status=0";
        $this->db->select('plant_name, count(lot.order_id) as order_id ');
        $this->db->from('lms_order_trans lot,employee_master em,plants p');
        $this->db->where($condition);
        $this->db->group_by("plant_code");
         $query = $this->db->get();
        return $query->result_array();

 
    }
    
}