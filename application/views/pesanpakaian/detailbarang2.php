<center>
    <h4>Detail Harga Barang</h4>
    <hr>
</center>
<table class="table">
    <tr><th>Nama Barang</th><th>Ukuran</th><th>Jumlah</th><th width="25%">Sub Total</th></tr>
<?php
$totalharga=0;
 foreach ($data['harga'] as $hg) {
     echo "<tr><td>";
        if ($hg['Ukuran']=='S') {
            if($data['jumlah']['s']==true){
            echo $hg['NamaBrg'];
            echo "<td>";
            echo $hg['Ukuran'];
            echo "<td>";
            echo $data['jumlah']['s'];
            echo "<td>Rp. ";
            echo $data['jumlah']['s']*$hg['Harga'];
            $totalharga=$totalharga+$data['jumlah']['s']*$hg['Harga'];          
        }
        } else if ($hg['Ukuran']=='M'){
            if($data['jumlah']['m']==true){
            echo $hg['NamaBrg'];
            echo "<td>";
            echo $hg['Ukuran'];
            echo "<td>";
            echo $data['jumlah']['m'];
            echo "<td>Rp. ";
            echo $data['jumlah']['m']*$hg['Harga'];
            $totalharga=$totalharga+$data['jumlah']['m']*$hg['Harga'];          
            }
        } else if ($hg['Ukuran']=='L'){
            if($data['jumlah']['l']==true){
            echo $hg['NamaBrg'];
            echo "<td>";
            echo $hg['Ukuran'];
            echo "<td>";
            echo $data['jumlah']['l'];
            echo "<td>Rp. ";
            echo $data['jumlah']['l']*$hg['Harga'];
            $totalharga=$totalharga+$data['jumlah']['l']*$hg['Harga'];          
            }
        } else if ($hg['Ukuran']=='XL'){
            if($data['jumlah']['xl']==true){
            echo $hg['NamaBrg'];
            echo "<td>";
            echo $hg['Ukuran'];
            echo "<td>";
            echo $data['jumlah']['xl'];
            echo "<td>Rp. ";
            echo $data['jumlah']['xl']*$hg['Harga'];
            $totalharga=$totalharga+$data['jumlah']['xl']*$hg['Harga'];          
            }
        } else if ($hg['Ukuran']=='XXL'){
            if($data['jumlah']['xxl']==true){
            echo $hg['NamaBrg'];
            echo "<td>";
            echo $hg['Ukuran'];
            echo "<td>";
            echo $data['jumlah']['xxl'];
            echo "<td>Rp. ";
            echo $data['jumlah']['xxl']*$hg['Harga'];
            $totalharga=$totalharga+$data['jumlah']['xxl']*$hg['Harga'];          
        }
    }
     
 }
 ?>
    <tr>
        <th><th><th>Total Harga     :<th><input class="form-control" id="disabledInput" type="text" name="namajenis" value="Rp. <?=$totalharga;?>"  disabled>
    </tr>
 </table>
 <hr><br><br>
 <center>
    <h4>Masukan Data Diri untuk Memesan</h4>
    <hr>
</center>

<div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>

<select class="custom-select custom-select-lg mb-3">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>

<select class="custom-select custom-select-sm">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>

<div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="customSwitch1">
  <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
</div>

<form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationTooltip01">First name</label>
      <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Last name</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltipUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
        <div class="invalid-tooltip">
          Please choose a unique and valid username.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03">City</label>
      <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
      <div class="invalid-tooltip">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip04">State</label>
      <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required>
      <div class="invalid-tooltip">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip05">Zip</label>
      <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
      <div class="invalid-tooltip">
        Please provide a valid zip.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>

<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</form>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>