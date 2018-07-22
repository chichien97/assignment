<!-- Top Navigation Bar -->
<nav>
  <ul class="nav-bar">
    <li class="nav-item">
    </li>
  </ul>
</nav>
<!-- Side Navigation Bar -->
<aside id="side_nav" class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="../dist/img/AdminLTELogo.png" alt="System Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Invoice_Sys</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Client Image">
      </div>
      <div class="info">
        <a href="" class="d-block"><?php echo $_SESSION["name"];?></a>
      </div>
    </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="font-size:20px;">
      <a href="client_dashboard.php"><i class="fa fa-home btn-icon btn-nav-icon" style="font-size:22px;"></i>Home</a>
    </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="font-size:20px;">
      <a href="client_quotation.php"><i class="fas fa-file btn-icon btn-nav-icon"></i>Quotation</a>
    </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="font-size:20px;">
      <a href="client_invoice.php"><i class="fas fa-receipt btn-icon btn-nav-icon"></i>Invoice</a>
    </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex n-drop" style="font-size:20px;">
      <a href="client_maintenance.php"><i class="fa fa-database btn-icon btn-nav-icon"></i>Maintenance</a>
      <div class="n-drop-content">
        <p class="n-drop-item" onclick="side_open_c()"><i class="fas fa-user-plus btn-icon"></i>Add Customer</p>
        <p class="n-drop-item" onclick="side_open_p()"><i class="fas fa-cube btn-icon"></i>Add Product</p>
      </div>
    </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="font-size:20px;">
      <a href="client_setting.php"><i class="fas fa-cogs btn-icon btn-nav-icon"></i>Setting</a>
    </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="font-size:20px;">
      <a href="../php/logout.php"><i class="fa fa-sign-out btn-icon btn-nav-icon"></i>Log out</a>
    </div>
    <div class="mb-3 nav-footer" style="font-size:13px;">
      <img src="../img/Logo.png" alt="company logo" class="logo">
      <hr />
      <p style="margin-bottom: 2px;">Copyright © 2018. All Right Reserved.</p>
      <!-- <p style="margin:0px;">All Right Reserved.</p> -->
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
<!-- /.sidebar -->
</aside>

<!-- MODAL FORM  MAINTENANCE-->
<!-- Customer Container -->
<div class="side-modal-container" id="side_modal_container">
  <div class="side-c-container" id="side_c_container">
    <!-- Add Customer Container -->
    <div class="customer-create-container" id="side_c_create">
      <div>
        <h3>Customer - Create New
          <i class="fa fa-close header-close" onclick="side_close()"></i>
        </h3>
        <form action="../php/maintenance_add.php" method="post">
          <div class="m-content">
            <label for="cust_name" class="customer-label">Name: </label>
            <input type="text" name="cust_name" class="customer-input" placeholder="Enter Customer Name" required>
          </div>
          <div class="m-content">
            <label for="cust_email" class="customer-label">Email: </label>
            <input type="email" name="cust_email" class="customer-input" placeholder="Enter Customer Email" required>
          </div>
          <div class="m-content">
            <label for="cust_contact" class="customer-label">Contact: </label>
            <input type="text" name="cust_contact" class="customer-input" placeholder="Enter Customer Contact" required>
          </div>
          <div class="m-content">
            <label for="cust_address_line" class="customer-label">Address Line: </label>
            <input type="text" name="cust_address_line" class="customer-input" placeholder="Enter Address" required>
          </div>
          <div class="m-content">
            <label for="cust_address_city" class="customer-label">City: </label>
            <input type="text" name="cust_address_city" class="customer-input" placeholder="Enter City" required>
          </div>
          <div class="m-content">
            <label for="cust_zip" class="customer-label">Zip / Postal Code: </label>
            <input type="text" name="cust_zip" class="customer-input" placeholder="Enter Zip/Postal Code" required>
          </div>
          <div class="m-content">
            <label for="cust_state" class="customer-label">State: </label>
            <input type="text" name="cust_state" class="customer-input" placeholder="Enter State" required>
          </div>
          <div class="m-content">
            <label for="cust_country" class="customer-label">Country: </label>
            <input type="text" name="cust_country" class="customer-input" placeholder="Enter Country" required>
          </div>
          <div class="m-content">
            <button type="submit" name="add_customer_btn" class="btn btn-add">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Product Container -->
  <div class="side-p-container" id="side_p_container">
  <!-- Create Product Container -->
  <div class="product-create-container" id="side_p_create">
    <div>
      <h3>Product - Create New
        <i class="fa fa-close header-close" onclick="side_close()"></i>
      </h3>

      <form action="../php/maintenance_add.php" method="post">
        <div class="m-content">
          <label for="pdct_name" class="product-label">Product Name: </label>
          <input type="text" name="pdct_name" class="product-input" placeholder="Enter Product Name" required>
        </div>
        <div class="m-content">
          <label for="pdct_price" class="product-label">Product Price: </label>
          <input type="text" name="pdct_price" class="product-input" placeholder="Enter Price" required>
        </div>
        <div class="m-content">
          <label for="pdct_descp" class="product-label">Product Description: </label>
          <textarea rows="3" cols="10" name="pdct_descp" class="product-input" placeholder="Enter Description" required></textarea>
        </div>
        <div class="m-content">
          <button type="submit" name="add_product_btn" class="btn btn-add">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
