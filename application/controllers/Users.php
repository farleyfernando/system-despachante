<?php 

defined('BASEPATH') or exit('Ação não permitida !!!');

class Users extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info', 'Sessão encerrada, favor efetuar o login novamente !!!');
            redirect('login');
        } 
    }

    public function index()
    {
        $data = [
            'titulo' => 'Usuários Cadstrados',

            'styles' => [
                        //Bootstrap
                        'vendors/bootstrap/dist/css/bootstrap.min.css',
                        //fontwasome
                        'vendors/font-awesome/css/font-awesome.min.css',
                        //BProgress
                        'vendors/nprogress/nprogress.css',
                        // iCheck
                        'vendors/iCheck/skins/flat/green.css',
                        //Cuaton theme style
                        'build/css/custom.min.css',
                        //DataTable
                        'vendors/datatables.net-bs/css/dataTables.bootstrap.min.css',
                        'vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
                        'vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
                        'vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
                        'vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'
                        ],
                
            'scripts' => [
                        //jQuery -->
                        'vendors/jquery/dist/jquery.min.js',
                        //Bootstrap
                        'vendors/bootstrap/dist/js/bootstrap.bundle.min.js',
                        //FastClick
                        'vendors/fastclick/lib/fastclick.js',
                        //BProgress
                        'vendors/nprogress/nprogress.js',
                        //jQuery custom content scroller
                        'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js', 
                        //DataTable
                        'vendors/datatables.net/js/jquery.dataTables.min.js',
                        'vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',                       
                        'vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
                        'vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
                        //Custom Theme Scripts
                        'build/js/custom.min.js',
                        ],


                        'users' => $this->ion_auth->users()->result(),  
                        
                    ];
                    //echo'<pre>';
                    //print_r($data['users']);
                    //exit;

                  

                $this->load->view('layout/header', $data);
                $this->load->view('users/index');
                $this->load->view('layout/footer');

    }

    public function add(){

        if(!$this->ion_auth->is_admin()){

            $this->session->set_flashdata('info', 'ACESSO NEGADO !!!');
            redirect('home');
        }

            $this->form_validation->set_rules('first_name', 'nome', 'trim|required|min_length[3]|max_length[15]');
            $this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('username', 'usuário', 'trim|required|is_unique[users.username]');
            $this->form_validation->set_rules('phone', 'telefone', 'required');
            $this->form_validation->set_rules('perfil_usuario', 'perfil usuário', 'required');
            $this->form_validation->set_rules('active', 'ativo', 'required');
            $this->form_validation->set_rules('password', 'senha', 'min_length[5]|max_length[255]');
            $this->form_validation->set_rules('confirma_password', 'confirmar senha', 'matches[password]');    

        if ($this->form_validation->run()) {

            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $email = $this->security->xss_clean($this->input->post('email'));

            $additional_data = [
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'email' => $this->input->post('email'),
                        'username' => $this->input->post('username'),
                        'phone' => $this->input->post('phone'),
                        'active' => $this->input->post('active'),
                        ];

            $additional_data['first_name'] = mb_strtoupper($this->input->post('first_name'));
            $additional_data['last_name'] = mb_strtoupper($this->input->post('last_name'));
            $additional_data['username'] = mb_strtolower($this->input->post('username'));
            $additional_data['email'] = mb_strtolower($this->input->post('email'));

            //echo '<pre>';
            //print_r($additional_data);
            //exit;            
            

            $group = [$this->input->post('perfil_usuario')];

            $additional_data = $this->security->xss_clean($additional_data);

            $group = $this->security->xss_clean($group);

            //echo '<pre>';
            //print_r($additional_data);
            //exit;

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                $this->session->set_flashdata('sucesso', 'Usuário cadastrado com sucesso !!!');
            } else {
                $this->session->set_flashdata('error', 'Erro ao cadastrar usuário !!!');
            }
            redirect('users');
        } else {
            //erro de validação

            $data = [       
                'titulo' => 'Cadastrar Usuário',    
                'styles' => [
                            //Bootstrap
                            'vendors/bootstrap/dist/css/bootstrap.min.css',
                            //fontwasome
                            'vendors/font-awesome/css/font-awesome.min.css',
                            //BProgress
                            'vendors/nprogress/nprogress.css',
                            // iCheck
                            'vendors/iCheck/skins/flat/green.css',
                            //Cuaton theme style
                            'build/css/custom.min.css',
                            ],
                    
                'scripts' => [
                            //jQuery -->
                            'vendors/jquery/dist/jquery.min.js',
                            //Bootstrap
                            'vendors/bootstrap/dist/js/bootstrap.bundle.min.js',
                            //FastClick
                            'vendors/fastclick/lib/fastclick.js',
                            //BProgress
                            'vendors/nprogress/nprogress.js',
                            //jQuery custom content scroller
                            'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js', 
                            //Custom Theme Scripts
                            'build/js/custom.min.js',
                            //mask
                            'vendors/mask/jquery.mask.min.js',
                            'vendors/mask/app.js',
                            ],
 
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('users/add');
        $this->load->view('layout/footer');
        }

        
    }

    public function edit($usuario_id = null)
    {
         //Se não for admin e tentar editar user diferente do seu
         if (!$this->ion_auth->is_admin()) {

            if (($this->session->userdata('user_id') != $usuario_id)) {
                $this->session->set_flashdata('error', 'ACESSO NEGADO !!!');
                redirect('users');
            }
        }
        

        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário não localizado !!!');
            redirect('users');
        } else {

            
            $this->form_validation->set_rules('first_name', 'nome', 'trim|required|min_length[3]|max_length[15]');
            $this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email_check');
            $this->form_validation->set_rules('username', 'usuário', 'trim|required|callback_username_check');
            $this->form_validation->set_rules('phone', 'telefone', 'required');
            $this->form_validation->set_rules('password', 'senha', 'min_length[5]|max_length[255]');
            $this->form_validation->set_rules('confirma_password', 'confirmar senha', 'matches[password]');

            if ($this->form_validation->run()) {

                //echo '<pre>';
                //print_r($this->input->post());
                //exit();

                $data = elements(
                    [
                        'first_name',
                        'last_name',                        
                        'email',
                        'username',
                        'phone',
                        'active',
                        'password'
                        
                    ], $this->input->post()
                );
           
                $data['first_name'] = mb_strtoupper($this->input->post('first_name'));
                $data['last_name'] = mb_strtoupper($this->input->post('last_name'));
                $data['username'] = mb_strtolower($this->input->post('username'));
                $data['email'] = mb_strtolower($this->input->post('email'));
                
                
                //echo '<pre>';
                //print_r($data);
                //exit;
                
                //if (!$this->ion_auth->is_admin()) {
                //    unset($data['active']);
              //  }           

                // verificação contra tentativa de introdução de codigos maliciosos no formulário limpando os formulários
                $data = $this->security->xss_clean($data);

                $password = $this->input->post('password');

                //verifica se foi passado a senha
                if (!$password) {
                    unset($data['password']);
                }

                

                   //echo '<pre>';
                   //print_r($data);
                   //exit;

                if ($this->ion_auth->update($usuario_id, $data)) {

                    //prefil usuario verificar
                    $perfil_usuario_db = $this->ion_auth->get_users_groups($usuario_id)->row();
                    $perfil_usuario_post = $this->input->post('perfil_usuario');

                     //echo '<pre>';
                    // print_r($perfil_usuario_post);
                     //exit;

                    //se o perfil for diferente atualiza o grupo

                    if ($this->ion_auth->is_admin()) {

                        if ($perfil_usuario_post != $perfil_usuario_db->id) {
                            $this->ion_auth->remove_from_group($perfil_usuario_db->id, $usuario_id);
    
                            $this->ion_auth->add_to_group($perfil_usuario_post, $usuario_id);
                        }
                    }
                    

                    $this->session->set_flashdata('sucesso', 'Atualização efetuada com sucesso !!!');
                } else {
                    $this->session->set_flashdata('error', 'Não foi possível efetuar a atualização !!!');
                }

                if($this->ion_auth->is_admin()){
                    redirect('users');                 
                }else{
                    redirect('users');
                }
                
            } else {
                $data = [           
                        'styles' => [
                                    //Bootstrap
                                    'vendors/bootstrap/dist/css/bootstrap.min.css',
                                    //fontwasome
                                    'vendors/font-awesome/css/font-awesome.min.css',
                                    //BProgress
                                    'vendors/nprogress/nprogress.css',
                                    // iCheck
                                    'vendors/iCheck/skins/flat/green.css',
                                    //Cuaton theme style
                                    'build/css/custom.min.css',
                                    
                                    ],
                            
                        'scripts' => [
                                    //jQuery -->
                                    'vendors/jquery/dist/jquery.min.js',
                                    //Bootstrap
                                    'vendors/bootstrap/dist/js/bootstrap.bundle.min.js',
                                    //FastClick
                                    'vendors/fastclick/lib/fastclick.js',
                                    //BProgress
                                    'vendors/nprogress/nprogress.js',
                                    //jQuery custom content scroller
                                    'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js', 
                                    //Custom Theme Scripts
                                    'build/js/custom.min.js',
                                    //mask
                                    'vendors/mask/jquery.mask.min.js',
                                    'vendors/mask/app.js',
                                    ],

                        'titulo' => 'Editar Usuário',
                        'users' => $this->ion_auth->user($usuario_id)->row(),
                        'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                        ];

                        $this->load->view('layout/header', $data);
                        $this->load->view('users/edit');
                        $this->load->view('layout/footer');
            }
        }
    }

    public function del($usuario_id = null)
    {
        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()){

            $this->session->set_flashdata('info','Não foi possível localizar o usuário!!!');
            redirect('users');
        }

        if ($this->ion_auth->is_admin($usuario_id)){
            $this->session->set_flashdata('error','Não é possivel excluir um Administrador!!!');
            redirect('users');  
        }

        if ($this->ion_auth->delete_user($usuario_id)){

            $this->session->set_flashdata('sucesso','Usuário excluído com sucesso!!!');
            redirect('users');  
        }else{

            $this->session->set_flashdata('error','Não foi possível excluir o usuário!!!');
            redirect('users');  
        }
    }

    public function email_check($email)
    {
        $usuario_id = $this->input->post('usuario_id');

        if ($this->core_model->get_by_id('users', ['email' => $email, 'id!=' => $usuario_id])) {
            $this->form_validation->set_message('email_check', 'Esse e-mail já existe');

            return false;
        } else {
            return true;
        }
    }

    public function username_check($username)
    {
        $usuario_id = $this->input->post('usuario_id');

        if ($this->core_model->get_by_id('users', ['username' => $username, 'id!=' => $usuario_id])) {
            $this->form_validation->set_message('username_check', 'Esse nome de usuário não está disponível');

            return false;
        } else {
            return true;
        }
    }
}
