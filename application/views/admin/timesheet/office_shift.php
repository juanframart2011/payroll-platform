<?php
/* Office Shift view
*/
?>
<?php
$session = $this->session->userdata('username');
$get_animate = $this->Xin_model->get_content_animate();
$role_resources_ids = $this->Xin_model->user_role_resource();

if( in_array( '280', $role_resources_ids ) ){

    $user_info = $this->Xin_model->read_user_info( $session['user_id'] ); ?>
    <div class="box mb-4 <?php echo $get_animate;?>">
        <div id="accordion">
            
            <div class="box-header with-border">

                <h3 class="box-title"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('left_office_shift');?></h3>
                <div class="box-tools pull-right">
                    <a class="text-dark collapsed" data-toggle="collapse" href="#add_form" aria-expanded="false"><button type="button" class="btn btn-xs btn-primary"> <span class="ion ion-md-add"></span> <?php echo $this->lang->line( 'xin_add_new' );?></button></a>
                </div>
            </div>

            <div id="add_form" class="collapse add-form <?php echo $get_animate;?>" data-parent="#accordion" style="">

                <div class="box-body">

                    <?php 
                    $attributes = array('name' => 'add_office_shift', 'id' => 'xin-form', 'autocomplete' => 'off');
                    $hidden = array('user_id' => $session['user_id']);
                    echo form_open('admin/timesheet/add_office_shift', $attributes, $hidden);?>
                        <div class="bg-white">

                            <div class="box-block">

                                <div class="row">

                                    <div class="col-md-10">
                                        <?php
                                        if( $user_info[0]->user_role_id == 1 ){ ?>
                                            <div class="form-group row">
                                                <label for="time" class="col-md-2"><?php echo $this->lang->line('left_company');?></label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>">
                                                        <option value=""></option>
                                                        <?php foreach($get_all_companies as $company) {?>
                                                            <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        else{ 
                                            $ecompany_id = $user_info[0]->company_id;?>
                                            <div class="form-group row">
                                                <label for="time" class="col-md-2"><?php echo $this->lang->line('left_company');?></label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>">
                                                        <option value=""></option>
                                                        <?php
                                                        foreach($get_all_companies as $company) {?>
                                                            <?php if($ecompany_id == $company->company_id):?>
                                                                <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                                                            <?php endif;?>
                                                        <?php
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php
                                        } ?>

                                        <div class="form-group row">
                                            <label for="time" class="col-md-2"><?php echo $this->lang->line('xin_shift_name');?></label>
                                            <div class="col-md-4">
                                                <input class="form-control" placeholder="<?php echo $this->lang->line('xin_shift_name');?>" name="shift_name" type="text" value="" id="name">
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label for="time" class="col-md-2">Prefijo</label>
                                            <div class="col-md-4">
                                                <input class="form-control" placeholder="Prefijo" name="prefijo" type="text" value="">
                                            </div>

                                            <div class="col-md-4">
                                                <input class="form-control" placeholder="Horas trabajada" name="hora_trabajo" type="number" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions box-footer">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php
}?>

<div class="box <?php echo $get_animate;?>">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('left_office_shift');?></h3>
    </div>

    <div class="box-body">
        <div class="box-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered" id="xin_table">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('xin_option');?></th>
                        <th><?php echo $this->lang->line('left_company');?></th>
                        <th><?php echo $this->lang->line('xin_day');?></th>
                        <th>Prefijo</th>
                        <th>Hora de Trabajo</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>