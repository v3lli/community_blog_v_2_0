<?php
function render_footer(){
    echo '<div class="footer">
          <div id="accordion">
            <div class="card">
              <div class="card-header">
                <a class=" pity-sans collapsed card-link font-weight-bold" data-toggle="collapse" href="#collapseOne">
                  Our Sponsors
                </a>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                <div class="card-body container">
                    <ul class="list-unstyled">
                    <a href="#"><li>Grace Cottage</li>
                    <a href="#"><li>Sanwo Olu</li>
                    <a href="#"><li>Dr Peeeeee</li>
                      </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <a class=" pity-sans collapsed card-link font-weight-bold" data-toggle="collapse" href="#collapseTwo">
                  Help Us
                </a>
              </div>
              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body container">
                    <ul class="list-unstyled">
                    <a href="#"><li>Become a real Visionary</li>
                    <a href="#"><li>Make A Donation</li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <a class="pity-sans collapsed card-link font-weight-bold" data-toggle="collapse" href="#collapseThree">
                  Help You
                </a>
              </div>
              <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body container" style="height: fit-content;">
                    <ul class=" pity-sans list-unstyled">
                    <a href="#"><li>Join a Support Group</li>
                    <a href="#"><li>Educate yourself on our many Topics</li>
                    <a href="#"><li>Join or Start a Discussion</li>
                    <a href="#"><li>Call Someone to Talk to</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </div>
      <footer class="d-block d-flex p-3 " style="font-size: small;"> 
        <div class="mr-auto mt-3">Privacy Legal Notice</div>
        <ul class="mt-3 list-inline mx-auto">
          <li class="list-inline-item px-1">
            <img src="../images/icons/facebook (1).png">
          </li>
          <li class="list-inline-item px-1">
              <img src="../images/icons/instagram.png">
          </li>
          <li class="list-inline-item px-1">
              <img src="../images/icons/twitter.png">
          </li>
          <li class="list-inline-item px-1">
              <img src="../images/icons/whatsapp (1).png">
          </li>
        </ul>
        <div class="ml-auto mt-3">© 2021 R.V.I.</div>
      </footer>
      <script src = "../scripts/jquery-3.5.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>  
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script src ="../scripts/paginator.js"></script>
      <script src ="../scripts/aoscripts.js"></script>
  </body>
</html>';
}

//