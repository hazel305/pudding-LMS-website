<?php
$title="수강평 댓글 등록";
$css_route="review/css/review.css";
$js_route = "review/js/review.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';

$rid = $_GET['rid'];
$uid = $_GET['uid'];
$cid = $_GET['cid'];

$sql = "SELECT r.*, u.username, u.userimg, c.name FROM review r
        JOIN users u ON r.uid = u.uid
        JOIN courses c ON c.cid = r.cid
        WHERE r.rid = '{$rid}' AND r.uid = '{$uid}' AND r.cid = '{$cid}'";
// var_dump($sql);

$result = $mysqli->query($sql);
$card = $result->fetch_assoc();
// var_dump($card);

?>
  <section>
  
    <h2 class="main_tt dark title-mg">수강평 댓글 등록</h2>

   
    
    <div class="card_container shadow_box border" data-id="<?= $card["rid"]; ?>">
      <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <img src="<?= $card["userimg"]; ?>" class="userImg shodow_box" alt="프로필 이미지">
          <h5 class="b_text01 dark review_user"><?= $card["username"]; ?></h5>

      
    
          <h5 class="b_text01 dark review_name"><span>강의명: </span><?= $card["name"]; ?></h5>
        

        </div>


      
        <div class="rating" data-rate="<?= $card["rating"]; ?>">

        <?php
          for ($i = 1; $i <= 5; $i++) {
              if ($i <= $card["rating"]) {
                  echo '<i class="ti ti-star-filled"></i>';
              } else {
                  echo '<i class="ti ti-star-filled not_star"></i>';
              }
          }
          ?>
        </div>
        
      </div>
    
      <div class="b_text02 review_content border">
        <p><?= $card["content"]; ?></p>
        <p><?= $card["regdate"]; ?>></p>
      </div>

      <div class="review_del">
        <a href="" class="icon"> <i class="ti ti-trash bin_icon"></i></a>
      </div>

       <div class="b_text02 review_c_content border">
              <div class="d-flex align-items-center">
                <img src="../images/profile_img.png" class="userImg shodow_box" alt="프로필 이미지">
                <h5 class="b_text01 primary review_user">프바오</h5>
                <!-- <h5 class="b_text02 dark review_name">2023-08-21</h5> -->
              </div>
              <form class="b_text02 reply_content border" action="review_create_ok.php?rid=<?=$rid?>" method="POST" >
              <input type="hidden" name="cid" value="<?=$cid?>">
              <input type="hidden" name="uid" value="<?=$uid?>">
                <!-- <p>PHP를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
                  이해하기 쉬었습니다.  기본기를 정리하는데 아주 좋은 강의였습니다</p> -->
               <textarea name="reply_create" id="reply_create" rows="6"></textarea>
              
          
              <div class="d-flex flex-row justify-content-end reply_btn_create">
                <button class="btn btn-primary b_text01 reply_done">등록 완료</button>
                <a href="/pudding-LMS-website/admin/review/review_list.php" class="btn btn-dark b_text01 reply">등록 취소</a>
              </div>
              </form>
            </div>
    </div>
    
    <!-- 카드 끝 -->
  
    <!-- 페이지네이션 -->
    <nav
    aria-label="Page navigation example"
    class="d-flex justify-content-center pager"
  >
    <ul class="pagination">
      <li class="page-item disabled">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&lsaquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">4</a></li>
      <li class="page-item"><a class="page-link" href="#">5</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&rsaquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- 페이지네이션 끝 -->
  </section>
  <script>
    $(document).ready(function() {
  $(".review_del a.icon").on("click", function(e) {
    e.preventDefault();
    let rId = $(this).closest(".card_container").attr("data-id");

    let data ={
      rid: rId
    }
    
    if (confirm("삭제하시겠습니까?")) {
        $.ajax({
            type: 'POST',
            url: 'review_delete.php',
            data: data,
            dataType: 'json',
            success: function(data) {
                if (data.result === 'ok') {
                    alert('리뷰가 삭제되었습니다.');
                    cardContainer.remove(); 
                } else {
                    alert('리뷰 삭제 실패');
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    } else {
        alert("삭제를 취소했습니다.");
    }
});
});

         
</script>
      
<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
