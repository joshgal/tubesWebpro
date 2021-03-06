<?php $this->load->view('page_header')?>
<style>

.card-container.card {
    max-width: 500px;
    padding: 100px ;
}


.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #ffffff;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 150px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.message    {
    margin-top: 0px;
    margin-bottom: 40px;
    text-align: center;
    font-family: heading-bold;
    font-weight: bold;
    font-size: 36px;
    background-color:#ffffff;
}

.reauth-project {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}


.form-initiate input[type=text],
.form-initiate button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-initiate .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-next {
    /*background-color: #4d90fe; */
    background-color: rgb(104, 145, 162);
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-initiate:hover,
.btn.btn-initiate:active,
.btn.btn-initiate:focus {
    background-color: rgb(12, 97, 33);
}

.scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}

</style>
<div class="container">
        <div class="card card-container">
            <h1 class="message">Let's get started!</h1>
            <form class="form-initiate">
                <span class="reauth-Project"></span>
                <label>Project Title</label>
                <input type="text" name="" id="inputProject" class="form-control" placeholder="Project Title" required autofocus>
                <label for="formGroupExampleInput" class="col-form-label">Choose the category of this project</label>
                <select class="form-control selectpicker" placeholder="Select Category" style="margin-bottom: 16px;">
                  <option hidden>Select Category</option>
                  <option>Music</option>
                  <option>Fashion</option>
                  <option>Technology</option>
                  <option>Art & Culture</option>
                  <option>Film & Video</option>
                  <option>Games</option>
                  <option>Publishing</option>
                  <option>Social</option>
                </select>
                <a href="<?= base_url('C_krowd_initiate/edit')?>" class="btn btn-lg btn-block btn-next text-white" type="submit" style="background: rgb(238, 48, 89);">Next</a>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
<?php $this->load->view('page_footer')?>
