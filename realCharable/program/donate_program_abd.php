<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * FROM `program` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
        echo "<script> alert('Unkown Product ID.'); location.replace('./?page=program') </script>";
        exit;
    }
}else{
    echo "<script> alert('Product ID is required.'); location.replace('./?page=program') </script>";
    exit;
}
?>
<style>
#prod-img-holder {
    height: 45vh !important;
    width: calc(100%);
    overflow: hidden;
    }

#prod-img {
    object-fit: scale-down;
    height: calc(100%);
    width: calc(100%);
    transition: transform .3s ease-in;
    }
#prod-img-holder:hover #prod-img{
    transform:scale(1.2);
    }

    .heading {
  background: url(uploads/4.1.png) no-repeat;
  /*background-color: #aed3e3;*/
  background-size: cover;
  background-position: center;
  text-align: center;
  padding-top: 2rem;
  padding-bottom: 1rem;
}

.heading h1 {
  color: #222;
  font-size: 4rem;
}

.heading p {
  padding-top: 1rem;
  font-size: 1rem;
  color: #666;
}

.heading p a {
  color: #222;
  padding-right: .5rem;
}

.heading p a:hover {
  color: #df6f79;
}

#prod-img-holder{
    width: 50%;
    padding-left:1rem;
}

#prog-detail{
    width: 48%;
    margin-left: 52%;
    margin-top:-31.3%;
    padding-right:1rem;

}
#desc{
    padding-right:1rem;
    padding-left:1rem;
    
}

#donateFormContainer {
  display: flex;
  justify-content: center;
  clear: both;
  flex-direction: column;
}

#donateForm {

  width: 65rem; 
  /*max-width: 950px; */
  display: block;
}
.form-container {
  display: block;
  margin-bottom: 20px; 
  border: 1px solid #4D4D4D;
}
hr.new {
  border-top: 1px solid black;
}


</style>


        <div class="content py-3" id="desc">
            <div class="card card-outline rounded-0 shadow" style="border:solid; border-width:thin;border-color: lightgrey;">
                <div class="card-header">
                    <h5 class="card-title" style="width:68rem; text-align:center;"><b>Description</b></h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div style="width:65rem;"><?= html_entity_decode($description) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-md-12 d-flex align-items-center justify-content-center" style="height: 100%;" id="donateFormContainer">
                <div class="form-container">
                    <form id="donateForm" class="p-4 ">
                        <h5><strong>Donated Goods Detail</strong> #1</h5>
                        <input type="hidden" id="program_id" name="program_id" value="<?= $id?>">
                        <input type="hidden" id="donor_id" name="donor_id" value="<?= $_settings->userdata('id')?>">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="firstname" class="control-label">Name</label>
                                <input type="text" id="name" autofocus name="name" class="form-control form-control-sm form-control-border" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname" class="control-label">Category</label>
                                <select class="form-control form-control-sm form-control-border" id="category" name="category" required>
                                <option value="">Select a category</option>
                                  <?php
                                    $program_qry = $conn->query("SELECT id, name FROM category_list");
                                    while ($row = mysqli_fetch_assoc($program_qry)) {
                                    $selected = '';
                                    if(isset($_GET['category_id']) == $row['id']) {
                                        $selected = 'selected';
                                      }
                                    echo "<option value='".$row['id']."' ".$selected.">".$row['name']."</option>";
                                         }
                                  ?>
                                <option value="">Others</option>
                               </select>
                            </div>
                       
                            <div class="form-group col-md-4">
                                <label for="contact" class="control-label">Condition</label>
                                <select class="form-control form-control-sm form-control-border" id="category" name="category" required>
                                <option value="0">Select a category</option>
                                <option value="1">Brand New</option>
                                <option value="2">Like New</option>
                                <option value="3">Lightly Used</option>
                                <option value="4">Heavily Used</option>
                                <option value="default">N/A</option>
                               </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="firstname" class="control-label">Quantity</label>
                                <input type="number" id="qty" autofocus name="qty" class="form-control form-control-sm form-control-border" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control form-control-sm rounded-0 summernote" required></textarea>
                                <!--<textarea id="description" name="description" class="form-control form-control-sm form-control-border" required></textarea>-->
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contact" class="control-label">Image</label>
                                <input type="file" accept="image/*" id="iamge" name="image" class="form-control form-control-sm form-control-border" required>
                            </div>
                        </div>
                  </form>
               </div>
        </div>

        <!--new form will be here-->
        <!--
        <div class="col-md-12 d-flex align-items-center justify-content-center" style="height: 100%;" id="donateFormContainer"> <-- donateFormContainer starts
          <div> <-- newFormContainer starts 
            <div class="form-container">

                      <form id="donateForm" class="p-4 ">
                          <h5><strong>Donated Goods Detail</strong> #1</h5>
                          <input type="hidden" id="program_id" name="program_id" value="<?//= $id?>">
                          <input type="hidden" id="donor_id" name="donor_id" value="<?//= $_settings->userdata('id')?>">
                          <div class="row">
                              <div class="form-group col-md-4">
                                  <label for="firstname" class="control-label">Name</label>
                                  <input type="text" id="name" autofocus name="name" class="form-control form-control-sm form-control-border" required>
                              </div>
                              <div class="form-group col-md-4">
                                  <label for="lastname" class="control-label">Category</label>
                                  <select class="form-control form-control-sm form-control-border" id="category" name="category" required>
                                  <option value="">Select a category</option>
                                  <?php/*
                                      $program_qry = $conn->query("SELECT id, name FROM category_list");
                                      while ($row = mysqli_fetch_assoc($program_qry)) {
                                      $selected = '';
                                      if(isset($_GET['category_id']) == $row['id']) {
                                          $selected = 'selected';
                                        }
                                      echo "<option value='".$row['id']."' ".$selected.">".$row['name']."</option>";
                                          }*/
                                    ?>
                                  <option value="">Others</option>
                                </select>
                              </div>
                        
                              <div class="form-group col-md-4">
                                  <label for="contact" class="control-label">Condition</label>
                                  <select class="form-control form-control-sm form-control-border" id="category" name="category" required>
                                  <option value="0">Select a category</option>
                                  <option value="1">Brand New</option>
                                  <option value="2">Like New</option>
                                  <option value="3">Lightly Used</option>
                                  <option value="4">Heavily Used</option>
                                  <option value="default">N/A</option>
                                </select>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="firstname" class="control-label">Quantity</label>
                                  <input type="number" id="qty" autofocus name="qty" class="form-control form-control-sm form-control-border" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="description" class="control-label">Description</label>
                                  <textarea name="description" id="description" rows="4" class="form-control form-control-sm rounded-0 summernote" required></textarea>
                                  <!--<textarea id="description" name="description" class="form-control form-control-sm form-control-border" required></textarea>
                              </div>
                              <div class="form-group col-md-4">
                                  <label for="contact" class="control-label">Image</label>
                                  <input type="file" accept="image/*" id="iamge" name="image" class="form-control form-control-sm form-control-border" required>
                              </div>
                          </div>
                    </form>
                </div>

                //newDonatedGoods starts <-- clone 

                <form id="donateForm" class="p-4 ">
                          <h5><strong>Donated Goods Detail</strong> #1</h5>
                          <input type="hidden" id="program_id" name="program_id" value="<?//= $id?>">
                          <input type="hidden" id="donor_id" name="donor_id" value="<?//= $_settings->userdata('id')?>">
                          <div class="row">
                              <div class="form-group col-md-4">
                                  <label for="firstname" class="control-label">Name</label>
                                  <input type="text" id="name" autofocus name="name" class="form-control form-control-sm form-control-border" required>
                              </div>
                              <div class="form-group col-md-4">
                                  <label for="lastname" class="control-label">Category</label>
                                  <select class="form-control form-control-sm form-control-border" id="category" name="category" required>
                                  <option value="">Select a category</option>
                                  <?php/*
                                      $program_qry = $conn->query("SELECT id, name FROM category_list");
                                      while ($row = mysqli_fetch_assoc($program_qry)) {
                                      $selected = '';
                                      if(isset($_GET['category_id']) == $row['id']) {
                                          $selected = 'selected';
                                        }
                                      echo "<option value='".$row['id']."' ".$selected.">".$row['name']."</option>";
                                          }*/
                                    ?>
                                  <option value="">Others</option>
                                </select>
                              </div>
                        
                              <div class="form-group col-md-4">
                                  <label for="contact" class="control-label">Condition</label>
                                  <select class="form-control form-control-sm form-control-border" id="category" name="category" required>
                                  <option value="0">Select a category</option>
                                  <option value="1">Brand New</option>
                                  <option value="2">Like New</option>
                                  <option value="3">Lightly Used</option>
                                  <option value="4">Heavily Used</option>
                                  <option value="default">N/A</option>
                                </select>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="firstname" class="control-label">Quantity</label>
                                  <input type="number" id="qty" autofocus name="qty" class="form-control form-control-sm form-control-border" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="description" class="control-label">Description</label>
                                  <textarea name="description" id="description" rows="4" class="form-control form-control-sm rounded-0 summernote" required></textarea>
                                  <!--<textarea id="description" name="description" class="form-control form-control-sm form-control-border" required></textarea>
                              </div>
                              <div class="form-group col-md-4">
                                  <label for="contact" class="control-label">Image</label>
                                  <input type="file" accept="image/*" id="iamge" name="image" class="form-control form-control-sm form-control-border" required>
                              </div>
                          </div>
                    </form> <-- newDonatedGoods ends

          </div> <-- newFormContainer ends 
        <div class="col-md-12 d-flex align-items-center justify-content-center" style="height: 100%;" id="donateFormContainer"> <-- donateFormContainer ends
      -->

   </div>
                 <div class="p-5 col-md-12">
                    <button class="btn btn-outline-secondary"  id="addGoodsBtn"> + Add Donated Goods</button><hr class="new p-3">
                    <button class="btn  btn-primary float-right col-md-3 " type="button" id="add_to_cart"><i class="#"></i><center>Submit</center></button>

              </div> 
              <div>
          </div>
          
    </div>
</div>



<script>
    // Get the "Add Donated Goods" button
const addButton = document.querySelector('.btn');

// Get the donate form
const donateForm = document.querySelector('#donateForm');

// Set the number of donated goods already displayed
let numDonatedGoods = 1;

// Add event listener to the "Add Donated Goods" button
addButton.addEventListener('click', () => {
// Clone the donate form
const newDonatedGoods = donateForm.cloneNode(true);

// Set the new donated goods' ID and header
numDonatedGoods++;
newDonatedGoods.id = `donateForm${numDonatedGoods}`;
newDonatedGoods.querySelector('h5').textContent = `Donated Goods Detail #${numDonatedGoods}`;


// Clear the new donated goods' input fields, except for program_id and donor_id
const inputFields = newDonatedGoods.querySelectorAll('input, textarea');
inputFields.forEach((field) => {
  if (field.id !== 'program_id' && field.id !== 'donor_id') {
    field.value = '';
  }
});




// Wrap the cloned form in a new container element and append it to the donateFormContainer
const newFormContainer = document.createElement('div');
newFormContainer.classList.add('form-container');
newFormContainer.appendChild(newDonatedGoods);
donateFormContainer.appendChild(newFormContainer);

});

const submitButton = document.querySelector('#add_to_cart');

submitButton.addEventListener('click', (event) => {
  event.preventDefault();

  const donatedGoodsForms = document.querySelectorAll('.form-container form');
console.log(donatedGoodsForms.length);


donatedGoodsForms.forEach((form) => {
  const formData = new FormData(form);
  console.log("form", formData);

  console.log('Before fetch');

  fetch(_base_url_+'classes/Master.php?f=add_new_donate', {
    method: 'POST',
    body: formData
  })
  .then((response) => {
    console.log('After fetch');
    return response.json(); // Parse response as JSON
  })
  .then((data) => {
    // Handle the response data
    console.log(data);
    // Update the UI with the response message and Bootstrap classes
    if (data.status === 'success') {
      $('#msg').text(data.msg).removeClass().addClass('alert alert-success');
      // Clear the form inputs
      form.reset();
      // Redirect to a page after 2 seconds
setTimeout(function() {
  window.location.href = _base_url_+'?page=donation_history/my_donations'; // Replace with your desired URL
}, 2000); // 2000 milliseconds = 2 seconds

    } else {
      $('#msg').text(data.msg).removeClass().addClass('alert alert-warning');
    }
    // You can perform other actions based on the response data
  })
  .catch((error) => {
    console.error(error);
  });
});



});





</script>