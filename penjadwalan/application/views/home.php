<!DOCTYPE html>
<html>
    <head>
    <title>Full Calendar CRUD</title>
        <meta charset='utf-8' />
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />
        <link href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css" rel="stylesheet" />        
        <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <!-- Custom css  -->
        <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />

        <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
        <script src='<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js'></script>

        <!-- CDN Select Picker -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
        

        <script src='<?php echo base_url();?>assets/js/main.js'></script>
        
    </head>
    <body>

        <div class="container">
                <!-- Notification -->
                <div class="alert"></div>
            <div class="row clearfix">
                <div class="col-md-12 column">
                        <div id='calendar'></div>
                </div>
            </div>
        </div>
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                        <input type="hidden" id="start">
                        <input type="hidden" id="end">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="jenisevent">Jenis Kegiatan</label>
                                <div class="col-md-6">
                                    <select class="form-control input md" id="jenisevent" name="jenisevent" type="text"  onchange="myFunction(event)">
                                        <option value="Fasilitasi Internet">Fasilitasi Internet</option>
                                        <option value="Assessment Jaringan">Assessment Jaringan</option>
                                        <option value="Pemasangan Jaringan">Pemasangan Jaringan</option>
                                        <option value="Troubleshooting Jaringan">Troubleshooting Jaringan</option>
                                        <option value="Internet Desa">Internet Desa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Nama Acara</label>
                                <div class="col-md-6">
                                    <input id="title" name="title" type="text" class="form-control input-md" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="instansi">Instansi</label>
                                <div class="col-md-6">
                                    <select class="form-control input md" data-live-search="true" id="instansi" name="instansi" type="text">
                                        <?php foreach ($instansi as $data): ?>
                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['nama_instansi'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="lokasi">Lokasi</label>
                                <div class="col-md-6">
                                    <input id="lokasi" name="lokasi" type="text" class="form-control input-md" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="isp">ISP</label>
                                <div class="col-md-6">
                                    <select class="form-control input md" id="isp" name="isp" type="text">
                                        <option value="JOL">JOL</option>
                                        <option value="TELKOM">TELKOM</option>
                                        <option value="NEXA">NEXA</option>
                                        <option value="LINTAS ARTA">LINTAS ARTA</option>
                                        <option value="ORBIT">ORBIT</option>
                                        <option value="METRO">METRO</option>
                                        <option value="Support Kominfo Setempat">Support Kominfo Setempat</option>
                                        <option value="Support Internet Setempat">Support Internet Setempat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="petugas">Petugas 1</label>
                                <div class="col-md-6">
                                    <select class="form-control input md" data-live-search="true" id="petugas" name="petugas" type="text">
                                        <?php foreach ($petugas as $data): ?>
                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['nama_petugas'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="petugas2">Petugas 2</label>
                                <div class="col-md-6">
                                    <select class="form-control input md" data-live-search="true" id="petugas2" name="petugas2" type="text">
                                        <?php foreach ($petugas as $data): ?>
                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['nama_petugas'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>                                  
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Catatan</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <label class="col-md-4 control-label" for="color">Color</label> -->
                                <div class="col-md-6">
                                    <input id="color" name="color" type="hidden" class="form-control input-md" readonly="readonly" />
                                    <!-- <span class="help-block">Click to pick a color</span> -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>



<script>
     // Auto Fill Value Color
     function myFunction(event) {
        console.log(event.target.value)
      
        if (event.target.value === "Fasilitasi Internet") {
          document.getElementById("color").value = "#ffc107";
        } else if (event.target.value === "Assessment Jaringan") {
          document.getElementById("color").value = "#6c757d";
        } else if (event.target.value === "Pemasangan Jaringan") {
            document.getElementById("color").value = "#28a745";
        } else if (event.target.value === "Troubleshooting Jaringan") {
          document.getElementById("color").value = "#dc3545";
        } else if (event.target.value === "Internet Desa") {
          document.getElementById("color").value = "#007bff";
        };
    }
</script>