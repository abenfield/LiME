   
      <!-- Footer -->
      <footer id ="footer-space"class="page-footer font-small blue footer fixed-bottom">
         <!-- Copyright -->
         <div class="footer-copyright text-center py-3">Powered by LiME
            <img src = "../content/lime.jpg" class="footer-logo"/>
         </div>
         <!-- Copyright -->
      </footer>
      <!-- Footer -->
   </body>

   <script src = "../js/form-validation.js"> </script>


   <script>
$('.readOnlyTags').tagsInput({
   'interactive':false,
   'width':'15em',
   'placeholderColor' : '#0af7dc'

});
</script>

<script>

$(document).ready(function () {
$('#scroll').DataTable({
"scrollY": "200px",
"scrollCollapse": true,
});
$('.dataTables_length').addClass('bs-select');
});

   </script>


</html>