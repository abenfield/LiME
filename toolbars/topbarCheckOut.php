     <div class = "topbar">
        <ul>
          <li class= "topbar-item"><div class="input-group md-form form-sm form-2 pl-0">
            <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <span class="input-group-text amber lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                  aria-hidden="true"></i></span>
            </div>
          </div>  </li>

        
          <?php 

          require($_SERVER['DOCUMENT_ROOT']. "/classes/listTransactions.php");
          $patron = $_GET["patronId"];
          $username = getUserName($patron);
          if ($_SESSION['auth'] == "user")
          echo   "<li class ='topbar-item'>All checkouts for $login_session </li>" ;
          else
          echo   "<li class ='topbar-item'>All checkouts for " . $username . "</li>";

          
          
          
          
          ?>
        <li class =" topbar-item">Sorted by: Book Title</li>

      </ul>
      
      </div>