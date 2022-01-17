<script src="jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="style.css">


<script>

function getSelectedValue() {
  var selectedValue = document.getElementById("list").value;
  
  if(selectedValue) {
  
  var html ='<input type="text" name="value[]" id="myValue" value="'+selectedValue+'"> <br>';
  
  $('.inp').append(html);
  $('.default').remove();
    
  }
}

</script>


<div class="container" >

<h3 style="margin-bottom: 30px;">Sample Project</h3>


<form action="" method="post">
  
  <div class="form-group" >
<?php

$myfile = fopen('list.txt','r') or die('Unable to read the file');

$friendList = explode(',',fread($myfile,filesize('list.txt')));
echo '<label for="question" class="form-label" style="margin-right: 10px;"> How many good friends do you have? </label>';
echo '<select name="" onchange="getSelectedValue();" id="list">';
  echo '<option value="" disable> Select </option>';
foreach($friendList as $listkey){
    echo '<option value="'.$listkey.'">'.$listkey.'</option>';
}
echo '</select>';

fclose($myfile);

?>
</div>

<div class="form-group inp">
<input type="text" name="value[]" id="myValue" placeholder="Friend's name here" value="" class="default" >
</div>

<br>
<button type="submit" name="subnit_btn">Save Friends List</button>


</form>
</div>



<?php

if(isset($_POST['subnit_btn'])){
        $listOfFriends = $_POST['value'];
        $savelist = implode(", ",$listOfFriends);

    $file=fopen("MyFriends.txt", "a");
    fwrite($file, $savelist);
    fclose($file);

    }
    


?>


