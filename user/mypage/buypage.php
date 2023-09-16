<?php
$title="마이페이지 - 구매내역";
$css_route="mypage/css/mypage.css";
$js_route = "mypage/js/mypage.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>
<main class="d-flex">
    <aside class="mypage_wrap">
      <div class="">
        <h4 class="jua main_tt my_title">마이페이지</h4>
        <nav>
          <ul>
            <li class="content_stt link_tag"><a href="#">내 강의실</a></li>
            <li class="content_stt"><a href="#">구매내역</a></li>
            <li class="content_stt"><a href="#">쿠폰함</a></li>
            <li class="content_stt"><a href="#">수강평</a></li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="section_wrap">
    <section class="content_wrap">
      <h1 class="jua main_tt">구매내역</h1>
      <div class="d-flex flex-column align-items-center">
        <div class="sales_container shadow_box border">
          <table class="table sales" id="payment_table">
            <thead>
              <tr>
                <th scope="col" class="col1">구매날짜</th>
                <th scope="col" class="col2">구매강의</th>
                <th scope="col" class="col3">상품금액</th>
                <th scope="col" class="col4">결제금액</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2023.09.11</td>
                <td>React 공식문서 함께 공부하기</td>
                <td><span class="number">100,000</span><span>원</span></td>
                <td>90,000원</td>
              </tr>
              <tr>
                <td>2023.09.11</td>
                <td>React 공식문서 함께 공부하기</td>
                <td><span class="number">100,000</span><span>원</span></td>
                <td>90,000원</td>
              </tr>
              <tr>
                <td>2023.09.11</td>
                <td>React 공식문서 함께 공부하기</td>
                <td><span class="number">100,000</span><span>원</span></td>
                <td>90,000원</td>
              </tr>
              <tr>
                <td>2023.09.11</td>
                <td>React 공식문서 함께 공부하기</td>
                <td><span class="number">100,000</span><span>원</span></td>
                <td>90,000원</td>
              </tr>
              <tr>
                <td>2023.09.11</td>
                <td>React 공식문서 함께 공부하기</td>
                <td><span class="number">100,000</span><span>원</span></td>
                <td>90,000원</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <nav
      aria-label="Page navigation example"
      class="d-flex justify-content-center pager user_pager"
    >
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&lsaquo;</span>
          </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
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
    </div>

    </main>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>
