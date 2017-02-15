<script type="text/javascript">

window.onload = function(){

(function(){
  var counter = 5;

  setInterval(function() {
    counter--;
    if (counter >= 1) {
      span = document.getElementById("count");
      span.innerHTML = counter;
    }
    // Display 'counter' wherever you want to display it.
    if (counter === 0) {
        var div = "<a class='btn-5'  href='<?php echo $this->row1['l_name']; ?>'><span class='fa fa-forward skip' aria-hidden='true'></a>"
        document.getElementById("rep").innerHTML = div;
        clearInterval(counter);
    }

  }, 1000);

})();

}

</script>
<!-- About Section -->
    <section class="success" id="about">
        <iframe id="frm" scrolling="auto"
src="<?php echo $this->row['l_name']; ?>"
id="rf2" frameborder="0" allowtransparency="true"
style="width:100%;height:100%"></iframe>
    </section>




