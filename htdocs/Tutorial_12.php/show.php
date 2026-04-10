
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
        }
    } 
    else 
    {
        echo "<p>No articles found for '<b>".htmlspecialchars($search_term)."</b>'</p>";
    }
}
?>