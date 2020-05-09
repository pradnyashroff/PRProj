<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LMS_cntr extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('login_database');
        $this->method_call = & get_instance();
        $this->load->database();  
        $this->load->model('LMS/LMSModel');
    }
	//profile pic fetch 
    public function profile_pic_fetch($emp_code) 
	{
        $this->load->database();
        $this->load->model('LMS/LMSModel');
        $data['profile_attachment'] = $this->LMSModel->profile_pic_fetch($emp_code);
        return $data['profile_attachment'];
    }
	function fetch_dept_nm($emp_dept) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('LMS/LMSModel');
        $data['dept_name'] = $this->LMSModel->fetch_dept_nm($emp_dept);
        return $data;
    }
    function fetch_book_nm($book_id) {
        $this->load->database();
        $this->load->model('LMS/LMSModel');
        $data['book_name'] = $this->LMSModel->fetch_book_nm($book_id);
        return $data;
    }

	function fetch_plant_nm($emp_plant) {
        $this->load->database();
        $this->load->model('LMS/LMSModel');
        $data['plant_name'] = $this->LMSModel->fetch_plant_nm($emp_plant);
        return $data;
    }
        function fetch_plant($emp_code) {
        $this->load->database();
        $this->load->model('LMS/LMSModel');
        $data['plant_code'] = $this->LMSModel->fetch_plant($emp_code);
        return $data;
    }
     function fetch_dept_code($emp_code) {
        $this->load->database();
        $this->load->model('LMS/LMSModel');
        $data['dept_code'] = $this->LMSModel->fetch_dept_code($emp_code);
        return $data;
    }

    function fetch_emp_nm($emp_code) {
        $this->load->database();
        $this->load->model('LMS/LMSModel');
        $data['emp_name'] = $this->LMSModel->fetch_emp_nm($emp_code);
        return $data;
    }
	public function plants()
	{
		$this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['plant_list']=$this->LMSModel->plant_list();  
        return  $data['plant_list'];		  
    } 
	
	//User 
	public function User_DashBoard() 
	{
        $this->load->helper('url');
        $this->load->view('LMS/User_Dashboard');
    }
    public function Reports() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Report');
    }
	public function AvilableBookTbl() 
	{
        $this->load->helper('url');
        $this->load->view('LMS/AvailableBookTbl');
    }
	public function PendingBookTbl() 
	{
        $this->load->helper('url');
        $this->load->view('LMS/PendingBookTbl');
    }
	public function IssuedBookTbl() 
	{
        $this->load->helper('url');
        $this->load->view('LMS/IssuedBookTbl');
    }
    public function ReturnedBookTbl() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/ReturnedBook');
    }
	public function BookHistoryTbl() 
	{
        $this->load->helper('url');
        $this->load->view('LMS/UserBookHistory');
    }

	public function CreateBook($book_id) 
	{  
        $data['book_id'] = $book_id;
        $this->load->helper('url');
        $this->load->view('LMS/CreateBook',$data);
    }
    public function UseReturnBookView($order_id) 
    {  
        $data['order_id'] = $order_id;
        $this->load->helper('url');
        $this->load->view('LMS/UserReturnBookView',$data);
    }
     public function BookHistoryView($order_id) 
    {  
        $data['order_id'] = $order_id;
        $this->load->helper('url');
        $this->load->view('LMS/BookHistoryView',$data);
    }
    public function PendingView($order_id) 
    {  
        $data['order_id'] = $order_id;
        $this->load->helper('url');
        $this->load->view('LMS/PendingView',$data);
    }

    public function UserRejectView($order_id) 
    {  
        $data['order_id'] = $order_id;
        $this->load->helper('url');
        $this->load->view('LMS/UserRejectView',$data);
    }

    public function Req_pending_book_view($order_id) 
    {  
        $data['order_id'] = $order_id;
        $this->load->helper('url');
        $this->load->view('LMS/Req_Pnding_Book_View',$data);
    }
	public function UserRejectBookTbl() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/UserRejectBookTbl');
    }
	//HR
	public function HR_DashBoard() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/HR_Dashboard');
    }
    public function PendReqBook() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Pend_req_book');
    }
     public function HrIssuedBook() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/HrIssuedBookTbl');
    }
    public function HrNearDeadline() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/HrNearDeadline');
    }
    public function HrCrossDeadline() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/HrCrossDeadline');
    }
    public function HrBookDelivered() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Hr_Book_Delivered');
    }
     public function HrDueDateRecord() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Hr_Due_Date_Record');
    }
	public function HrTotalBook() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/HrTotalBook');
    }


    //Admin/Book keeper
     public function AdminHomePage() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/AdminHomePage');
    }
    public function admin_dashboard() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/admin_dashboard');
    }
     public function Admin_Total_Book() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/AdminTotalBook');
    }
    public function Admin_Available_Book() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Available_Book');
    }
    public function Admin_Given_Book() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Given_Book');
    }
     public function AdminRejectBookTbl() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/AdminRejectBookTbl');
    }
     public function AdminRejectBookView($order_id) 
    {  
        $data['order_id'] = $order_id;
        $this->load->helper('url');
        $this->load->view('LMS/AdminRejectBookView',$data);
    }
     public function AdminRejectBook(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['RejectBook']=$this->LMSModel->AdminRejectBook();  
        return  $data['RejectBook'];          
    }
    public function Admin_Request_Book() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Request_book');
    }
     public function Admin_Waiting_Book() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Waiting_list');
    }
     public function Admin_Stock_Dashboard() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_stockdashboard');
    }
    public function E_BookTbl() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/E_BookTbl');
    }
     public function Admin_Stock_TotalBook() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Total_Books');
    }
    public function Admin_Stock_OverDueDate() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Over_Due_Date');
    }
    public function Stock_Given_Book() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Stock_Given_Book');
    }
    public function Admin_Pending_book() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_req_tbl');
    }

    public function Admin_Add_New_Book() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Add_New_Book');
    }
    public function Admin_Add_Category() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Add_Category');
    }
    public function Admin_Add_Quantity($book_id) 
    {
        $data['book_id'] = $book_id;
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Add_Quantity',$data);
    }
    public function Admin_New_Book_Req() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_New_book_Req');
    }
    public function Admin_Quantity_Tbl() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Quantity_Tbl');
    }
    public function Admin_Book_list() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/Admin_Book_list');
    }
     public function Admin_Manage_Cate() 
    {
        $this->load->helper('url');
        $this->load->view('LMS/manage_book_category');
    }
    public function addQuantity($id) {
        $this->load->database();  
        $this->load->model('LMS/LMSModel');
        //$data = $this->LMSModel->addQuantity($id);
        $data['Book_Quantity']=$this->LMSModel->addQuantity($id);
        return  $data['Book_Quantity'];
    }
    public function AdminBookDtl($id) {
        $this->load->database();  
        $this->load->model('LMS/LMSModel');
        $data = $this->LMSModel->AdminBookDtl($id);
        echo json_encode($data);
    }
    public function totalQuantity($id) {
        $this->load->database();  
        $this->load->model('LMS/LMSModel');
        //$data = $this->LMSModel->addQuantity($id);
        $data['Total_Quantity']=$this->LMSModel->totalQuantity($id);
        return  $data['Total_Quantity'];
    }
     public function EditCate($id) {
        $this->load->database();  
        $this->load->model('LMS/LMSModel');
        $data = $this->LMSModel->EditCate($id);
        echo json_encode($data);
    }

    //03/04/2020
    public function book_Category(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Book_Category']=$this->LMSModel->book_category();  
        return  $data['Book_Category'];          
    } 
    public function book_Name(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['book_Name']=$this->LMSModel->book_Name();  
        return  $data['book_Name'];          
    } 
    public function addBook() 
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        //upload Book Thumnel
        if(!empty($_FILES['file_book_tumbnel']['name']))
        {
            $config['upload_path'] = 'uploads/LMS/BookThumnel';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['file_name'] = $_FILES['file_book_tumbnel']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('file_book_tumbnel'))
            {
                $uploadData = $this->upload->data();
                $file_book_tumbnel = $uploadData['file_name'];
            }
            else
            {
                $file_book_tumbnel = '';
            }
            }
            else
            {
                $file_book_tumbnel = '';
            }
            //upload E-Book Link
        if(!empty($_FILES['file_EBookLink']['name']))
        {
            $config['upload_path'] = 'uploads/LMS/EBook';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['file_name'] = $_FILES['file_EBookLink']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('file_EBookLink'))
            {
                $uploadData = $this->upload->data();
                $file_EBookLink = $uploadData['file_name'];
            }
            else
            {
                $file_EBookLink = '';
            }
            }
            else
            {
                $file_EBookLink = '';
            }
            $data = array(
                'cat_id' => $this->input->post('sel_Category'),
                'book_name' => $this->input->post('txt_book_name'),
                'autho_name' => $this->input->post('txt_author_name'),
                'publisher' => $this->input->post('txt_publisher'),
                'book_price' => $this->input->post('txt_price'),
                'edition' => $this->input->post('txt_Edition'),
                'book_tumbnel' => $file_book_tumbnel,
                'ebook_link' => $file_EBookLink,
                'book_type' => $this->input->post('sel_Book_Type'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCodeEdit'),
                'book_status' => 1
            );

        $this->load->database();  
        $this->load->model('LMS/LMSModel'); 
        $this->LMSModel->addBook($data);
        redirect('LMS/LMS_cntr/Admin_Stock_Dashboard');
    }
    public function editBookDetails() 
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $bookId = $this->input->post('txtBookId');
        $data = array(
                'cat_id' => $this->input->post('txtBookType'),
                'book_name' => $this->input->post('txtBookNm'),
                'autho_name' => $this->input->post('txtBookAuthoNm'),
                'publisher' => $this->input->post('txtPublisher'),
                'book_price' => $this->input->post('txtPrice'),
                'edition' => $this->input->post('txtEdition'),
            );

        $this->load->database();  
        $this->load->model('LMS/LMSModel'); 
        $this->LMSModel->editBookDetails($data,$bookId);
        echo '<script>  window.history.back()</script>';
    }
    public function addBookCate() 
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $data = array(
                'cat_name' => $this->input->post('txt_cate_Name'),
                'cat_desc' => $this->input->post('txtArea_cate_descri'),
                'cat_regdate' => $date,
                'cat_regtime' => $time,
        );
        $this->load->database();  
        $this->load->model('LMS/LMSModel'); 
        $this->LMSModel->addBookCate($data);
        redirect('LMS/LMS_cntr/Admin_Stock_Dashboard');
    }
    public function editBookCate() 
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $cateId = $this->input->post('txtCateId');
        $data = array(
                'cat_name' => $this->input->post('txtCateNm'),
                'cat_desc' => $this->input->post('txtCateDescri'),
        );
        $this->load->database();  
        $this->load->model('LMS/LMSModel'); 
        $this->LMSModel->editBookCate($data,$cateId);
        echo '<script>  window.history.back()</script>';
    }
    public function deleteBookCate($id) {
        $this->load->helper('url');
        $this->load->database();
        $this->db->query("delete from lms_cate_mst where cat_id='" . $id . "'");
    }
    public function deleteBook($id) {
        $this->load->helper('url');
        $this->load->database();
        $this->db->query("delete from lms_book_mst where book_id='" . $id . "'");
    }
    public function addBookQuantity() 
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $book_id=$this->input->post('txt_bookId');
        $old_book_Qunt=$this->input->post('txt_oldQuantity');
        $new_book_Qunt=$this->input->post('txt_quantity');
        $total_Book_Count= $old_book_Qunt + $new_book_Qunt;
        $data = array(
                'book_id' =>  $book_id,
                'book_qty' => $new_book_Qunt,
                'total_book' =>  $total_Book_Count,
                'orderd_by' => $this->input->post('txtEmpCodeEdit'),
                'entry_date' => $date,
                'entry_time' => $time,
                'entry_by' => $this->input->post('txtEmpCodeEdit'),
                'book_stok_stus' => 1,
        );
         $data1 = array(
                'book_stok_stus' => 0,
        );
        $this->load->database();  
        $this->load->model('LMS/LMSModel');
        $this->LMSModel->updateBookStatus($data1,$book_id); 
        $this->LMSModel->addBookQuantity($data);
        redirect('LMS/LMS_cntr/Admin_Stock_Dashboard');
    }
    public function SendRequest() 
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $data = array(
                'book_id' => $this->input->post('txt_bookID'),
                'order_by' => $this->input->post('txt_emp_code'),
                'order_date' => $date,
                'order_time' => $time,
                'allocate_to_person' =>100847,
                'return_by_person' =>100847,
                'remark' =>$this->input->post('areaComment'),
                'order_status' => 0,
                
        );
        $this->load->database();  
        $this->load->model('LMS/LMSModel'); 
        $this->LMSModel->SendRequest($data);
        redirect('LMS/LMS_cntr/PendingBookTbl');
    }
    public function ReturnBook() 
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $BookReturn = $this->input->post('BookReturn');
        $edit_order_id=$this->input->post('txt_Order_Id');
        $stock_Id=$this->input->post('txt_BookStockId');
        $total_Book=$this->input->post('txt_totalBook');
        $InStock=$this->input->post('txt_Instock');
        $Outstanding=$this->input->post('txt_OutstandingBook');
        $InStockBook=$InStock+1;
        $OutstandingBook=$Outstanding-1;
        $data = array(
                'return_by_person' => $this->input->post('txt_emp_code'),
                'order_status' =>2,
                'remark' =>$this->input->post('areaComment'),
            );
             $data1 = array(
                'book_stok_id' => $stock_Id,
                'order_id' => $edit_order_id,
                'in_stock' => $InStockBook,
                'outstanding_book' => $OutstandingBook,
                'entry_date' => $date,
                'entry_time' => $time,
                'entry_by' => $this->input->post('txt_emp_code'),
                'book_tran_stus' => 2,
                );
             $data2 = array(
                'book_tran_stus' => 2,

                );
             $this->load->database();  
            $this->load->model('LMS/LMSModel'); 
            $this->LMSModel->updateOrderTranretun($data,$edit_order_id);
            $this->LMSModel->AcceptRequest($data1);
            $this->LMSModel->updateBooktranissuedBook($data2,$edit_order_id);
            
        redirect('LMS/LMS_cntr/User_DashBoard');
      }
     public function AcceptRequest() 
    {
       
        $stock_Id=$this->input->post('txt_BookStockId');
        $oldstock_Id=$this->input->post('txt_oldstockId');
        if($stock_Id==$oldstock_Id OR $stock_Id=='')
        {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $order_id=$this->input->post('txt_OrderId');
        $acceptReq=$this->input->post('accept');
        $total_Book=$this->input->post('txt_totalBook');
        $stock_Id=$this->input->post('txt_BookStockId');
        $oldstock_Id=$this->input->post('txt_oldstockId');
        $InStock=$this->input->post('txt_newInstock');
        $Outstanding=$this->input->post('txt_newOutstandingBook');
        $dueDate=Date('Y-m-d', strtotime('+8 days'));
        $InStockBook=$total_Book-$Outstanding-1;
        $OutstandingBook=$total_Book-$InStockBook;
        if ($acceptReq == "Accept") 
        {
        $data = array(
                'book_due_date' => $dueDate,
                'order_status' => 1,
                'remark' => $this->input->post('areaComment'),
                );
       
        $data2 = array(
                'book_stok_id' => $stock_Id,
                'order_id' => $order_id,
                'in_stock' => $InStockBook,
                'outstanding_book' => $OutstandingBook,
                'entry_date' => $date,
                'entry_time' => $time,
                'entry_by' => $this->input->post('txt_emp_code'),
                'book_tran_stus' => 1,
                );
         
            $this->LMSModel->updateOrderTran($data,$order_id);
            $this->LMSModel->AcceptRequest($data2);
         }
         else
        {
            $data4 = array(
                'order_status' => 4,
                'remark' => $this->input->post('areaComment'),
                );
            $this->LMSModel->updateOrderReject($data4,$order_id);   
        }
    }
    else
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $order_id=$this->input->post('txt_OrderId');
        $acceptReq=$this->input->post('accept');
        $total_Book=$this->input->post('txt_totalBook');
        $stock_Id=$this->input->post('txt_BookStockId');
        $oldstock_Id=$this->input->post('txt_oldstockId');
        $txt_oldInstock=$this->input->post('txt_oldInstock');
        $txt_oldOutstandingBook=$this->input->post('txt_oldOutstandingBook');
        $dueDate=Date('d-m-Y', strtotime('+8 days'));
        $InStockBook=$total_Book-$txt_oldOutstandingBook-1;
        $OutstandingBook=$total_Book-$InStockBook;
        if ($acceptReq == "Accept") 
        {
        $data = array(
                'book_due_date' => $dueDate,
                'order_status' => 1,
                'remark' => $this->input->post('areaComment'),
                );
       
        $data2 = array(
                'book_stok_id' => $stock_Id,
                'order_id' => $order_id,
                'in_stock' => $InStockBook,
                'outstanding_book' => $OutstandingBook,
                'entry_date' => $date,
                'entry_time' => $time,
                'entry_by' => $this->input->post('txt_emp_code'),
                'book_tran_stus' => 1,
                );
         
            $this->LMSModel->updateOrderTran($data,$order_id);
            $this->LMSModel->AcceptRequest($data2);
         }
         else
        {
            $data4 = array(
                'order_status' => 4,
                'remark' => $this->input->post('areaComment'),
                );
            $this->LMSModel->updateOrderReject($data4,$order_id);   
        }

    }
        redirect('LMS/LMS_cntr/Admin_Given_Book');
    
    }

     public function totalBookCount($book_id){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['totakBookCount']=$this->LMSModel->totalBookCount($book_id);  
        return  $data['totakBookCount'];          
    }

    public function Admin_Given_Book_View($order_id){
        $data['order_id'] = $order_id;
        $this->load->helper('url');
        $this->load->view('LMS/AdminGivenBookView',$data);
    }
    public function User_Issued_Book_View($order_id){
        $data['order_id'] = $order_id;
        $this->load->helper('url');
        $this->load->view('LMS/User_Issued_Book_View',$data);
    }
    public function fetchBookDetails($book_id){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['fetchBookDetails']=$this->LMSModel->fetchBookDetails($book_id);  
        return  $data['fetchBookDetails'];          
    }
    public function bookDetails($book_id){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['BookDetails']=$this->LMSModel->BookDetails($book_id);  
        return  $data['BookDetails'];          
    }
    public function totalBook($book_id){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['totalBook']=$this->LMSModel->totalBook($book_id);  
        return  $data['totalBook'];          
    }
    public function InStockBook($book_id){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['InStock']=$this->LMSModel->InStockBook($book_id);  
        return  $data['InStock'];          
    }
    public function StockQuantity($book_id){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['StockQuantity']=$this->LMSModel->StockQuantity($book_id);  
        return  $data['StockQuantity'];          
    }
    public function oldBookOutstanding($book_id){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['oldBookOutstanding']=$this->LMSModel->oldBookOutstanding($book_id);  
        return  $data['oldBookOutstanding'];          
    }
    public function oldStockID($book_id){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['oldStockID']=$this->LMSModel->oldStockID($book_id);  
        return  $data['oldStockID'];          
    }
     public function totakBookCount(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['totakBookCount']=$this->LMSModel->totakBookCount();  
        return  $data['totakBookCount'];          
    }
     public function Admin_Stock_Total_Book(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Stock_total_book']=$this->LMSModel->Admin_Stock_Total_Book();  
        return  $data['Admin_Stock_total_book'];          
    }
    public function Admin_Total_Book_plantOne(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plant1']=$this->LMSModel->Admin_Total_Book_plantOne();  
        return  $data['Admin_Total_Book_plant1'];          
    }
    public function Admin_Total_Book_plantTwo(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plantTwo']=$this->LMSModel->Admin_Total_Book_plantTwo();  
        return  $data['Admin_Total_Book_plantTwo'];          
    }
    public function Admin_Total_Book_plantThree(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plantThree']=$this->LMSModel->Admin_Total_Book_plantThree();  
        return  $data['Admin_Total_Book_plantThree'];          
    }
    public function Admin_Total_Book_plantFour(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plantFour']=$this->LMSModel->Admin_Total_Book_plantFour();  
        return  $data['Admin_Total_Book_plantFour'];          
    }
   public function Admin_Total_Book_plantFive(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plantFive']=$this->LMSModel->Admin_Total_Book_plantFive();  
        return  $data['Admin_Total_Book_plantFive'];          
    }
    public function Admin_Total_Book_plantSix(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plantSix']=$this->LMSModel->Admin_Total_Book_plantSix();  
        return  $data['Admin_Total_Book_plantSix'];          
    }
    public function Admin_Total_Book_plantSeven(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plantSeven']=$this->LMSModel->Admin_Total_Book_plantSeven();  
        return  $data['Admin_Total_Book_plantSeven'];          
    }
    public function Admin_Total_Book_plantEight(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plantEight']=$this->LMSModel->Admin_Total_Book_plantEight();  
        return  $data['Admin_Total_Book_plantEight'];          
    }
    public function Admin_Total_Book_plantNine(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plantNine']=$this->LMSModel->Admin_Total_Book_plantNine();  
        return  $data['Admin_Total_Book_plantNine'];          
    }
    public function Admin_Total_Book_plantTen(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book_plantTen']=$this->LMSModel->Admin_Total_Book_plantTen();  
        return  $data['Admin_Total_Book_plantTen'];          
    }
     public function E_BookTblDetails(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['E_Book']=$this->LMSModel->E_BookTblDetails();  
        return  $data['E_Book'];          
    }
    public function Admin_Total_Book_count(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book']=$this->LMSModel->Admin_Total_Book();  
        return  $data['Admin_Total_Book'];          
    }

     public function Admin_Availble_Book_count(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_Total_Book']=$this->LMSModel->Admin_Avilable_Book();  
        return  $data['Admin_Total_Book'];          
    }
    public function E_BookCount(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['E_BookCount']=$this->LMSModel->E_BookCount();  
        return  $data['E_BookCount'];          
    }
    public function admin_pending_book_count($emp_code){
        $this->load->database($emp_code);  
        $this->load->model('LMS/LMSModel');  
        $data['admin_pending_book']=$this->LMSModel->admin_pending_book_count($emp_code);  
        return  $data['admin_pending_book'];          
    }
     public function admin_Given_book_count($emp_code){
        $this->load->database($emp_code);  
        $this->load->model('LMS/LMSModel');  
        $data['admin_pending_book']=$this->LMSModel->admin_Given_book_count($emp_code);  
        return  $data['admin_pending_book'];          
    }
    public function RejectBook($emp_code){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['RejectBook']=$this->LMSModel->RejectBook($emp_code);  
        return  $data['RejectBook'];          
    }
    public function pendingBook($emp_code){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['pendingBook']=$this->LMSModel->pendingBook($emp_code);  
        return  $data['pendingBook'];          
    }
    public function BookHistoryDetails($emp_code){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['BookHistory']=$this->LMSModel->BookHistoryDetails($emp_code);  
        return  $data['BookHistory'];          
    }
    public function issuedBook($emp_code){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['issuedBook']=$this->LMSModel->issuedBook($emp_code);  
        return  $data['issuedBook'];          
    }
     public function ReturnBookDetails($emp_code){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['ReturnedBook']=$this->LMSModel->ReturnBookDetails($emp_code);  
        return  $data['ReturnedBook'];          
    }
    public function bookOverDueDate(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['bookOverDueDate']=$this->LMSModel->bookOverDueDate();  
        return  $data['bookOverDueDate'];          
    }
    public function Adminmanage_cate(){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['Admin_manage_cate']=$this->LMSModel->Adminmanage_cate();  
        return  $data['Admin_manage_cate'];          
    }
    public function Admin_Stock_Fetch($book_id){
        $this->load->database();  
        $this->load->model('LMS/LMSModel');  
        $data['book_details']=$this->LMSModel->Admin_Stock_Fetch($book_id);  
        return  $data['book_details'];          
    }  
    function RequestBookDetail($order_id) {
        $this->load->database();  
        $this->load->model('LMS/LMSModel');
        $data['RequestBookDetail'] = $this->LMSModel->RequestBookDetail($order_id);
        return $data['RequestBookDetail'];
    }
    public function viewBookDetails($id) {
        $this->load->database();  
        $this->load->model('LMS/LMSModel');
        $data = $this->LMSModel->viewBookDetails($id);
        echo json_encode($data);
    }
    function PlantWiseReport(){
        $data  = $this->LMSModel->PlantWiseReport();
        print_r(json_encode($data, true));
    }
    function DueDateWiseReport(){
        $data  = $this->LMSModel->DueDateWiseReport();
        print_r(json_encode($data, true));
    }
     function plantWiseBookRequest(){
        $data  = $this->LMSModel->plantWiseBookRequest();
        print_r(json_encode($data, true));
    }
     

}

   