<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <input type="text" value="<?php if(isset($_GET['s']) && !empty($_GET['s'])){echo $_GET['s'];} ?>" name="s" id="s" placeholder="Buscador de artículos" />
    <input type="submit" id="searchsubmit" value="" />
</form>