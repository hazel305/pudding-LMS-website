<?php
$title = "홈";
$css_route = "css/index.css";
$js_route = "js/index.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/header.php';

// 인기 강의
$sql = "SELECT * FROM `courses` WHERE isbest = 1";
$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsc[] = $rs;
}

// 추천 강의
$rc_sql = "SELECT * FROM `courses` WHERE isrecom = 1";
$rc_result = $mysqli->query($rc_sql);
while ($rc_rs = $rc_result->fetch_object()) {
  $rc_rsc[] = $rc_rs;
}

// 신규 강의
$new_sql = "SELECT * FROM `courses` WHERE isnew = 1";
$new_result = $mysqli->query($new_sql);
while ($new_rs = $new_result->fetch_object()) {
  $new_rsc[] = $new_rs;
}

// 공지사항
$ntsql = "SELECT * FROM notice ORDER BY ntid DESC LIMIT 0, 10";
$ntresult = $mysqli->query($ntsql);
while ($ntrs = $ntresult->fetch_object()) {
  $ntrsc[] = $ntrs;
}


?>
<main>
  <section class="sec1">
    <!-- Swiper -->
    <div class="swiper sec1_slide">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="images/main/main_slide_01.png" alt="슬라이드 이미지_01"></div>
        <div class="swiper-slide"><img src="images/main/main_slide_02.png" alt="슬라이드 이미지_02"></div>
        <div class="swiper-slide"><img src="images/main/main_slide_03.png" alt="슬라이드 이미지_03"></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  <section class="sec2">
    <h2 class="jua dark sec_tt">어떤 강의를 찾고 있나요?</h2>
    <form action="" class="search">
      <label for="course_search" type="hidden"></label>
      <input type="text" id="course_search" placeholder="필요한 강의를 찾아보세요.">
      <button><i class="ti ti-search"></i></button>
    </form>
    <div class="category_box radius_12">
      <ul>
        <li>
          <a href="">
            <img src="images/main/html.png" alt="HTML">
            <p>HTML</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/css.png" alt="CSS">
            <p>CSS</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/js.png" alt="Javascript">
            <p>Javascript</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/php.png" alt="PHP">
            <p>PHP</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/react.png" alt="React">
            <p>React</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/mysql.png" alt="SQL">
            <p>SQL</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/phython.png" alt="Python">
            <p>Python</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/figma.png" alt="Figma">
            <p>Figma</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/psd.png" alt="PS">
            <p>PS</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/illust.png" alt="illustration">
            <p>AI</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/ae.png" alt="After Effect">
            <p>After Effect</p>
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/main/indei.png" alt="InDesign">
            <p>InDesign</p>
          </a>
        </li>
      </ul>
    </div>
  </section>
  <section class="sec3 container">
    <h2 class="jua dark sec_tt">푸딩 인기 BEST!</h2>
    <div class="card_wrap">
      <ul class="d-flex">
        <?php
        if (isset($rsc)) {
          foreach ($rsc as $item) {
            ?>
            <li>
              <div class="card" style="width: 18rem;">
                <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php
                    $strTitle = $item->name;
                    $strTitle = mb_strimwidth($strTitle, 0, 26, "...", "utf-8");
                    echo $strTitle;
                    ?>
                  </h5>
                  <div class="card-text">
                    <p class="duration_wrap">
                      <i class="ti ti-calendar-event"></i>수강기간
                      <span class="duration">
                        <?php if ($item->due == '') {
                          echo '무제한';
                        } else {
                          echo $item->due;
                        }
                        ?>
                      </span>
                    </p>
                    <p class=""><span class="price">
                        <?= $item->price ?>
                      </span><span>원</span></p>
                  </div>
                </div>
              </div>
              <div class="view_wrap">
                <a href="#" class="view_btn">상세보기</button>
                  <a href="#"><i class="ti ti-heart"></i></a>
                  <a href="#"><i class="ti ti-basket"></i></a>
              </div>
            </li>
            <?php
          }
        }
        ?>
      </ul>
    </div>
  </section>
  <section class="sec4 container">
    <h2 class="jua dark sec_tt">푸딩 추천 강의</h2>
    <!-- Swiper -->
    <div class="page_wrap">
      <div class="swiper recom_slide">
        <div class="swiper-wrapper">
          <?php
          if (isset($rc_rsc)) {
            foreach ($rc_rsc as $item) {
              ?>
              <div class="swiper-slide">
                <div class="card">
                  <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="강의 썸네일">
                  <div class="card-body">
                    <div class="badge_wrap">
                      <span class="badge rounded-pill b-pd
                      <?php
                      // 뱃지컬러
                      $levelBadge = $item->level;
                      if ($levelBadge === '초급') {
                        echo 'yellow_bg';
                      } else if ($levelBadge === '중급') {
                        echo 'green_bg';
                      } else {
                        echo 'red_bg';
                      }
                      ?>">
                        <?= $item->level ?>
                      </span>
                      <span class="badge rounded-pill green_bg b-pd">
                        <?php
                        //뱃지 키워드 
                        if (isset($item->cate)) {
                          $categoryText = $item->cate;
                          $parts = explode('/', $categoryText);
                          $lastPart = end($parts);
                          echo $lastPart;
                        }
                        ?>
                      </span>
                    </div>
                    <h5 class="card-title">
                      <?php
                      $strTitle = $item->name;
                      $strTitle = mb_strimwidth($strTitle, 0, 36, "...", "utf-8");
                      echo $strTitle;
                      ?>
                    </h5>
                    <div class="card-text">
                      <p class=""><i class="ti ti-calendar-event"></i>수강기간
                        <span class="duration">
                          <?php if ($item->due == '') {
                            echo '무제한';
                          } else {
                            echo $item->due;
                          }
                          ?>
                        </span>
                      </p>
                      <p class=""><span class="price">
                          <?= $item->price ?>
                        </span><span>원</span></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>
  <section class="sec5 container">
    <h2 class="jua dark sec_tt">푸딩 신규 강의</h2>
    <!-- Swiper -->
    <div class="page_wrap">
      <div class="swiper new_slide">
        <div class="swiper-wrapper">
        <?php
          if (isset($new_rsc)) {
            foreach ($new_rsc as $item) {
              ?>
              <div class="swiper-slide">
                <div class="card">
                  <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="강의 썸네일">
                  <div class="card-body">
                    <div class="badge_wrap">
                      <span class="badge rounded-pill b-pd
                      <?php
                      // 뱃지컬러
                      $levelBadge = $item->level;
                      if ($levelBadge === '초급') {
                        echo 'yellow_bg';
                      } else if ($levelBadge === '중급') {
                        echo 'green_bg';
                      } else {
                        echo 'red_bg';
                      }
                      ?>">
                        <?= $item->level ?>
                      </span>
                      <span class="badge rounded-pill green_bg b-pd">
                        <?php
                        //뱃지 키워드 
                        if (isset($item->cate)) {
                          $categoryText = $item->cate;
                          $parts = explode('/', $categoryText);
                          $lastPart = end($parts);
                          echo $lastPart;
                        }
                        ?>
                      </span>
                    </div>
                    <h5 class="card-title">
                      <?php
                      $strTitle = $item->name;
                      $strTitle = mb_strimwidth($strTitle, 0, 36, "...", "utf-8");
                      echo $strTitle;
                      ?>
                    </h5>
                    <div class="card-text">
                      <p class=""><i class="ti ti-calendar-event"></i>수강기간
                        <span class="duration">
                          <?php if ($item->due == '') {
                            echo '무제한';
                          } else {
                            echo $item->due;
                          }
                          ?>
                        </span>
                      </p>
                      <p class=""><span class="price">
                          <?= $item->price ?>
                        </span><span>원</span></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>
  <section class="sec6">
    <img src="images/main/coupon_banner.png" alt="쿠폰 배너">
  </section>
  <section class="sec7 container">
    <h2 class="jua dark">Why the PUDDING?</h2>
    <h3 class="jua">왜 푸딩을 선택할까?</h3>
    <div class="d-flex sec7_content" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1500">
      <div class="sec7_box">
        <h4>쉽게 떠 먹는 코딩</h4>
        <p>
          입문자도 쉽게 이해할 수 있는 코딩 강의!<br>
          꼭 필요한 내용만 알차게 학습할 수 있어요.<br>
          코딩을 푸딩처럼 쉽게 떠먹어 볼까요?<br>
        </p>
        <img src="images/main/sec7_01.png" alt="쉽게 떠 먹는 코딩 이미지">
      </div>
      <div class="sec7_box">
        <h4>쉽게 떠 먹는 사이트</h4>
        <p>
          쉽고 빠르게 나에게 꼭 맞는 강의를 알고 싶다면!<br>
          단조로운 영상 위주의 강의보다 재밌고<br>
          능동적으로 배울 수 있어요.<br>
          게다가 모바일 기기에서도 실습 가능!<br>
        </p>
        <img src="images/main/sec7_02.png" alt="쉽게 떠 먹는 사이트">
      </div>
    </div>
  </section>
  <section class="sec8 pudding_bg dark">
    <div class="container">
      <div class=col-6>
        <h2><span>541,113</span> 명이</h2>
        <h2>푸딩과 함께합니다</h2>
        <p class="pudding_is">
          PUDDING은 강의평점과 후기를 투명하게 공개합니다.<br>
          타 사이트들은 성과를 높이기 위해 특정 후기만 노출 하거나,<br>
          아예 숨겨버리는 경우가 많습니다.<br>
          그러나 PUDDING은 강의에 실 사용자들의 후기, 학생수 등 정보를<br>
          투명하게 공개합니다.<br>
          투명한 신뢰성이 여러분들에게 더 좋은 컨텐츠와 교육의 질을<br>
          높여 드릴 것을 약속 드립니다.<br>
        </p>
      </div>
      <div class=col-6>
        <div class="swiper review_slide">
          <div class="swiper-wrapper">
            <div class="swiper-slide d-flex align-items-center justify-content-between">
              <div class="card_container radius_5 white_bg">
                <div class="b_text02">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                      <img src="../images/pdata/users/image1.jpg" class="userImg shodow_box" alt="프로필 이미지" />
                      <h5 class="b_text01 review_user">김유림</h5>
                      <h5 class="b_text02 dark review_name">REACT 쇼핑몰 만들기</h5>
                      <h5 class="b_text02 dark review_date">2023-09-14</h5>
                    </div>
                    <div class="rating" data-rate="4">
                      <i class="ti ti-star-filled"></i>
                      <i class="ti ti-star-filled"></i>
                      <i class="ti ti-star-filled"></i>
                      <i class="ti ti-star-filled"></i>
                      <i class="ti ti-star"></i>
                    </div>
                  </div>
                  <div class="b_text02 reply_content radius_12">
                    <p>REACT를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
                      이해하기 쉬었습니다. 기본기를 정리하는데 아주 좋은 강의였습니다</p>
                  </div>
                  <div class="d-flex flex-row justify-content-end reply_btn_wrap">
                  </div>
                </div>
              </div>

            </div>
            <div class="swiper-slide d-flex align-items-center justify-content-between">
              dfdfdf
            </div>
          </div>

        </div>

      </div>
  </section>
  <section class="sec9 dark">
    <div class="container d-flex align-items-center justify-content-center">
      <h2>공지사항</h2>
      <div class="swiper notice_slide">
        <div class="swiper-wrapper">
          <?php
          if (isset($ntrsc)) {
            foreach ($ntrsc as $item) {
              ?>
              <div class="swiper-slide d-flex align-items-center justify-content-between"><span>
                  <?= $item->nt_title ?>
                </span><span>
                  <?= $item->nt_regdate ?>
                </span></div>
              <?php
            }
          }
          ?>
        </div>
      </div>
      <a href="#"><i class="ti ti-circle-plus"></i>더보기</a>
    </div>


  </section>
</main>

<!-- <li>
    <div class="card" style="width: 18rem;">
      <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
      <div class="card-body">
        <div>
          <span class="badge rounded-pill blue_bg b-pd">고급</span>
          <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
        </div>
        <h5 class="card-title">실무 자바 개발을 위한 디자인</h5>
        <div class="card-text">
          <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
          <p class=""><span class="price">10,000</span><span>원</span></p>
        </div>
      </div>
    </div>
  </li> -->
<aside class="main_btn">
  <div class="history_btn">
    <a href="">
      <img src="images/clock-history.png" alt="">
    </a>
  </div>
  <div class="top_btn">
    <a href="">
      <img src="images/top_btn.png" alt="">
    </a>
  </div>
</aside>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/footer.php';
?>