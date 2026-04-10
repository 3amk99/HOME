<?php
require_once "config.php" ;
$category_list = $categories->read() ;
$id_selected_category = 0 ;
if(isset($_POST['button_submit']))
{
    $id_selected_category = $_POST['id_category'] ;
}
?>

<button id="go_home_page">
    <a href="index.php">go home</a>
</button>
<h1>Search Articles</h1>
<input type="text" id="searchInput" placeholder="Type article title">
<div id="results">
</div>
<script>
    document.getElementById("searchInput").addEventListener("keyup", 
    function()
    {
        let query = this.value;
        if(query.length > 0)
        {
            fetch("show.php?search=" + encodeURIComponent(query))
            .then(response => response.text())
            .then(data => 
            {
                document.getElementById("results").innerHTML = data;
            });
        }
        else 
        {
            document.getElementById("results").innerHTML = "";
        }
    });
</script>






<form method="POST">
 <select name="id_category" >
    <option value="0">---Select pls---</option>
    <?php
        foreach($category_list as $u)
        {
            //if + else + isset($_POST['id_category']) ===> just to see this
           //"selected" in the option part 
           if($id_selected_category == $u['id'])
           {
            $selected = "selected" ;
           }
           else
           {
            $selected = "" ;
           }
           echo "<option value='".$u['id']."' $selected>".$u['name']."</option>";
        }
    ?>
 </select>
 <button type="submit" name="button_submit">
        send
 </button>
</form>


<a href=""></a>

<?php
if($id_selected_category != 0)
{
    $box_category_articles = $article->read_By_category($id_selected_category);
    foreach($box_category_articles as $a )
    {
      echo "<h3>".$a['title']."</h3> <br>" ;
      echo "<p>".$a['content']."</p>" ;
      echo "<p>".$a['date']."</p>" ;
      if(!empty($a['photo'])) 
      {
       echo "<img src='".$a['photo']."' width='100'><hr>";
      }
      echo "
      <button>
        <a href='delete.php?value=".$a['id']."' >delete</a>
      </button>";
      echo "
      <button>
        <a href='update.php?value_update=".$a['id']."' >update</a>
      </button>";
    }
}
?>







<?php
if(isset($_GET['search'])) 
{
    $search_term = trim($_GET['search']);
    $sql = "SELECT * FROM Article WHERE title LIKE :title";
    $stmt = (new Database())->connection()->prepare($sql);
    $stmt->execute(['title' => "%$search_term%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($results) > 0)
    {
        foreach($results as $a)
        {
            echo "<h3>".$a['title']."</h3>";
            echo "<p>".$a['content']."</p>";
            echo "<p>".$a['date']."</p>";
            if(!empty($a['photo'])) 
            {
                echo "<img src='".$a['photo']."' width='100'><hr>";
            }
            echo "
            <button>
                <a href='delete.php?value=".$a['id']."' >delete</a>
            </button>";
        }
    } 
    else
    {
        echo "<p>No articles found for '<b>".htmlspecialchars($search_term)."</b>'</p>";
    }
}
?>
