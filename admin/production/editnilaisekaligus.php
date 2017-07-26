<?php
    include "../../library/koneksi.php";
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $sql = mysqli_query("SELECT * FROM nilai_sekaligus WHERE id = $id");
        while ($result = mysqli_fetch_array($sql)){
		?>
        <form action="proseseditnilaisekaligus.php" method="post">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <div class="form-group">
                <label>Umur</label>
                <input type="number" required="" class="form-control" name="umur" value="<?php echo $result['umur']; ?>">
            </div>
            <div class="form-group">
                <label>M1</label>
                <input type="number" required="" class="form-control" name="umur" value="<?php echo $result['M1']; ?>">
            </div>
            <div class="form-group">
                <label>M2</label>
                <input type="number" required="" class="form-control" name="nama" value="<?php echo $result['M2']; ?>">
            </div>
            <div class="form-group">
                <label>M3</label>
                <input type="number" required="" class="form-control" name="umur" value="<?php echo $result['M3']; ?>">
            </div>
            <div class="form-group">
                <label>M4</label>
                <input type="number" required="" class="form-control" name="nama" value="<?php echo $result['M4']; ?>">
            </div>
            <div class="form-group">
                <label>F1</label>
                <input type="number" required="" class="form-control" name="umur" value="<?php echo $result['F1']; ?>">
            </div>
            <div class="form-group">
                <label>F2</label>
                <input type="number" required="" class="form-control" name="nama" value="<?php echo $result['F2']; ?>">
            </div>
            <div class="form-group">
                <label>F3</label>
                <input type="number" required="" class="form-control" name="umur" value="<?php echo $result['F3']; ?>">
            </div>
            <div class="form-group">
                <label>F4</label>
                <input type="number" required="" class="form-control" name="nama" value="<?php echo $result['F4']; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>     
        <?php } }
?>