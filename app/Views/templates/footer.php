</div> <!-- End container -->
  <!-- Load jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Size Adjustment Script -->
  <script>
    (function(){
      // Get the initial computed font size (in pixels) from the body.
      var bodyStyle = window.getComputedStyle(document.body);
      var currentFontSize = parseFloat(bodyStyle.fontSize);

      document.getElementById('increase-font').addEventListener('click', function(e){
        e.preventDefault();
        currentFontSize += 2; // Increase font size by 2px
        document.body.style.fontSize = currentFontSize + 'px';
      });
      
      document.getElementById('decrease-font').addEventListener('click', function(e){
        e.preventDefault();
        currentFontSize -= 2; // Decrease font size by 2px
        document.body.style.fontSize = currentFontSize + 'px';
      });
    })();
  </script>
</body>
</html>
