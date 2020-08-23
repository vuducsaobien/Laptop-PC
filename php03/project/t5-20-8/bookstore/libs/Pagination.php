<?php
class Pagination{
	
	private $totalItems;					// Tổng số phần tử
	private $totalItemsPerPage		= 1;	// Tổng số phần tử xuất hiện trên một trang
	private $pageRange				= 5;	// Số trang xuất hiện
	private $totalPage;						// Tổng số trang
	private $currentPage			= 1;	// Trang hiện tại
	
	public function __construct($totalItems, $pagination){
		$this->totalItems			= $totalItems;
		$this->totalItemsPerPage	= $pagination['totalItemsPerPage'];
		
		if($pagination['pageRange'] %2 == 0) $pagination['pageRange'] = $pagination['pageRange'] + 1;
		
		$this->pageRange			= $pagination['pageRange'];
		$this->currentPage			= $pagination['currentPage'];
		$this->totalPage			= ceil($totalItems/$pagination['totalItemsPerPage']);
	}
	
// <div class="card-footer clearfix">
//     <ul class="pagination pagination-sm m-0 float-right">
//         <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-double-left"></i></a></li>
//         <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-left"></i></a></li>
//         <li class="page-item active"><a class="page-link">1</a></li>
//         <li class="page-item"><a class="page-link" href="#">2</a></li>
//         <li class="page-item"><a class="page-link" href="#">3</a></li>
//         <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
//         <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
//     </ul>
// </div>


	public function showPagination($link){
		// Pagination
		$paginationHTML = '';
		if($this->totalPage > 1){
			$start 	= '<div class="button2-right off"><div class="start"><span>Start</span></div></div>';
			$prev 	= '<div class="button2-right off"><div class="prev"><span>Pre</span></div></div>';
			if($this->currentPage > 1){
				$start 	= '<div class="button2-right"><div class="start"><a onclick="javascript:changePage(1)" href="#">Start</a></div></div>';
				$prev 	= '<div class="button2-right"><div class="prev"><a onclick="javascript:changePage('.($this->currentPage-1).')" href="#">Previous</a></div></div>';
			}
		
			$next 	= '<div class="button2-left off"><div class="next"><span>Next</span></div></div>';
			$end 	= '<div class="button2-left off"><div class="end"><span>End</span></div></div>';
			if($this->currentPage < $this->totalPage){
				$next 	= '<div class="button2-left"><div class="next"><a onclick="javascript:changePage('.($this->currentPage+1).')" href="#">Next</a></div></div>';
				$end 	= '<div class="button2-left"><div class="end"><a href="#" onclick="javascript:changePage('.$this->totalPage.')">End</a></div></div>';
			}
		
			if($this->pageRange < $this->totalPage){
				if($this->currentPage == 1){
					$startPage 	= 1;
					$endPage 	= $this->pageRange;
				}else if($this->currentPage == $this->totalPage){
					$startPage		= $this->totalPage - $this->pageRange + 1;
					$endPage		= $this->totalPage;
				}else{
					$startPage		= $this->currentPage - ($this->pageRange-1)/2;
					$endPage		= $this->currentPage + ($this->pageRange-1)/2;
		
					if($startPage < 1){
						$endPage	= $endPage + 1;
						$startPage = 1;
					}
		
					if($endPage > $this->totalPage){
						$endPage	= $this->totalPage;
						$startPage 	= $endPage - $this->pageRange + 1;
					}
				}
			}else{
				$startPage		= 1;
				$endPage		= $this->totalPage;
			}

			$listPages = '<div class="button2-left"><div class="page">';
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->currentPage) {
					$listPages .= '<span>'.$i.'</span>';
				}else{
					$listPages .= '<a href="#" onclick="javascript:changePage('.$i.')">'.$i.'</a>';
				}
			}
			$listPages .= '</div></div>';
			$endPagination	= '<div class="limit">Page '.$this->currentPage.' of '.$this->totalPage.'</div>';
			$paginationHTML = '<div class="pagination">' . $start . $prev . $listPages . $next . $end . $endPagination . '</div>';
		}
		return $paginationHTML;
	}
}