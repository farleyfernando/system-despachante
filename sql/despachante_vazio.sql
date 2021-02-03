-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Fev-2021 às 19:53
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `despachante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `arquivo_id` int(11) NOT NULL,
  `arquivo_files` varchar(100) DEFAULT NULL,
  `arquivo_url` varchar(100) DEFAULT NULL,
  `arquivo_cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nome` varchar(45) NOT NULL,
  `categoria_ativa` tinyint(1) DEFAULT NULL,
  `categoria_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `cliente_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `cliente_tipo` tinyint(1) DEFAULT NULL,
  `cliente_nome` varchar(45) NOT NULL,
  `cliente_sobrenome` varchar(150) NOT NULL,
  `cliente_dn` date NOT NULL,
  `cliente_cpf_cnpj` varchar(20) NOT NULL,
  `cliente_rg_ie` varchar(20) NOT NULL,
  `cliente_email` varchar(50) NOT NULL,
  `cliente_telefone` varchar(20) NOT NULL,
  `cliente_celular` varchar(20) NOT NULL,
  `cliente_cep` varchar(10) NOT NULL,
  `cliente_endereco` varchar(155) NOT NULL,
  `cliente_num_end` varchar(20) NOT NULL,
  `cliente_bairro` varchar(45) NOT NULL,
  `cliente_complemento` varchar(145) NOT NULL,
  `cliente_cidade` varchar(105) NOT NULL,
  `cliente_estado` varchar(2) NOT NULL,
  `cliente_ativo` tinyint(1) NOT NULL,
  `cliente_obs` tinytext DEFAULT NULL,
  `cliente_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `combustivel`
--

CREATE TABLE `combustivel` (
  `combustivel_id` int(11) NOT NULL,
  `combustivel_nome` varchar(45) NOT NULL,
  `combustivel_ativo` tinyint(1) DEFAULT NULL,
  `combustivel_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `conta_pagar_id` int(11) NOT NULL,
  `conta_pagar_fornecedor_id` int(11) DEFAULT NULL,
  `conta_pagar_data_venc` date DEFAULT NULL,
  `conta_pagar_data_pagamento` datetime DEFAULT NULL,
  `conta_pagar_valor` varchar(15) DEFAULT NULL,
  `conta_pagar_status` tinyint(1) DEFAULT NULL,
  `conta_pagar_obs` tinytext DEFAULT NULL,
  `conta_pagar_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `conta_receber_id` int(11) NOT NULL,
  `conta_receber_cliente_id` int(11) NOT NULL,
  `conta_receber_data_venc` date DEFAULT NULL,
  `conta_receber_data_pagamento` datetime DEFAULT NULL,
  `conta_receber_valor` varchar(20) DEFAULT NULL,
  `conta_receber_status` tinyint(1) DEFAULT NULL,
  `conta_receber_obs` tinytext DEFAULT NULL,
  `conta_receber_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `cor_id` int(11) NOT NULL,
  `cor_nome` varchar(45) NOT NULL,
  `cor_ativo` tinyint(1) DEFAULT NULL,
  `cor_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `empresa_id` int(11) NOT NULL,
  `empresa_razao_social` varchar(145) DEFAULT NULL,
  `empresa_nome_fantasia` varchar(145) DEFAULT NULL,
  `empresa_cnpj` varchar(25) DEFAULT NULL,
  `empresa_ie` text DEFAULT NULL,
  `empresa_tel_fixo` varchar(25) DEFAULT NULL,
  `empresa_tel_movel` varchar(25) NOT NULL,
  `empresa_email` varchar(100) DEFAULT NULL,
  `empresa_site` varchar(100) DEFAULT NULL,
  `empresa_cep` varchar(25) DEFAULT NULL,
  `empresa_endereco` varchar(145) DEFAULT NULL,
  `empresa_numero` varchar(10) DEFAULT NULL,
  `empresa_bairro` varchar(45) DEFAULT NULL,
  `empresa_cidade` varchar(45) DEFAULT NULL,
  `empresa_estado` varchar(2) DEFAULT NULL,
  `empresa_obs` tinytext DEFAULT NULL,
  `empresa_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`empresa_id`, `empresa_razao_social`, `empresa_nome_fantasia`, `empresa_cnpj`, `empresa_ie`, `empresa_tel_fixo`, `empresa_tel_movel`, `empresa_email`, `empresa_site`, `empresa_cep`, `empresa_endereco`, `empresa_numero`, `empresa_bairro`, `empresa_cidade`, `empresa_estado`, `empresa_obs`, `empresa_data_alteracao`) VALUES
(1, 'JIUVAN KLEBERss', 'JIUVAN DESPACHANTE', '21.434.535/0001-11', '343.434.434.111', '(18) 3281-1111', '(18) 98191-1111', 'farley@uol.com.br', 'www.uol.com.br', '19.470-111', 'Fortaleza', '1111', 'Centro', 'Presidente Epitácio', 'SP', 'teste', '2021-01-15 00:50:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especies`
--

CREATE TABLE `especies` (
  `especie_id` int(11) NOT NULL,
  `especie_nome` varchar(45) NOT NULL,
  `especie_ativo` tinyint(1) DEFAULT NULL,
  `especie_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `color` varchar(10) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Levar documentos detran', '#FFD700', '2021-01-21 14:00:00', '2021-01-21 15:00:00'),
(2, 'Ligar Cliente Fernando', '#0071c5', '2021-01-25 10:00:00', '2021-01-25 10:30:30'),
(3, 'Detran', '#FFD700', '2021-01-25 12:42:29', '2021-01-25 13:39:43'),
(4, 'Pagar boleto ', '#0071c5', '2021-01-25 12:39:43', '2021-01-25 13:39:43'),
(5, 'Detran', '#FFD700', '2021-01-25 12:39:43', '2021-01-25 13:39:43'),
(6, 'Pagar boleto ', '#0071c5', '2021-01-25 12:39:43', '2021-01-25 13:39:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pagamentos`
--

CREATE TABLE `formas_pagamentos` (
  `forma_pagamento_id` int(11) NOT NULL,
  `forma_pagamento_nome` varchar(45) DEFAULT NULL,
  `forma_pagamento_aceita_parc` tinyint(1) DEFAULT NULL,
  `forma_pagamento_ativa` tinyint(1) DEFAULT NULL,
  `forma_pagamento_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `fornecedor_id` int(11) NOT NULL,
  `fornecedor_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `fornecedor_tipo` tinyint(1) DEFAULT NULL,
  `fornecedor_nome` varchar(45) NOT NULL,
  `fornecedor_sobrenome` varchar(150) NOT NULL,
  `fornecedor_dn` date NOT NULL,
  `fornecedor_cpf_cnpj` varchar(20) NOT NULL,
  `fornecedor_rg_ie` varchar(20) NOT NULL,
  `fornecedor_email` varchar(50) NOT NULL,
  `fornecedor_telefone` varchar(20) NOT NULL,
  `fornecedor_celular` varchar(20) NOT NULL,
  `fornecedor_cep` varchar(10) NOT NULL,
  `fornecedor_endereco` varchar(155) NOT NULL,
  `fornecedor_num_end` varchar(20) NOT NULL,
  `fornecedor_bairro` varchar(45) NOT NULL,
  `fornecedor_complemento` varchar(145) NOT NULL,
  `fornecedor_cidade` varchar(105) NOT NULL,
  `fornecedor_estado` varchar(2) NOT NULL,
  `fornecedor_ativo` tinyint(1) NOT NULL,
  `fornecedor_obs` tinytext DEFAULT NULL,
  `fornecedor_data_alteracao` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'user', 'Users');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_tem_servicos`
--

CREATE TABLE `ordem_tem_servicos` (
  `ordem_ts_id` int(11) NOT NULL,
  `ordem_ts_id_servico` int(11) DEFAULT NULL,
  `ordem_ts_id_ordem_servico` int(11) DEFAULT NULL,
  `ordem_ts_quantidade` int(11) DEFAULT NULL,
  `ordem_ts_valor_unitario` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_desconto` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_total` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de relacionamento entre as tabelas servicos e ordem_servico';

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servicos`
--

CREATE TABLE `ordens_servicos` (
  `ordem_servico_id` int(11) NOT NULL,
  `ordem_servico_forma_pagamento_id` int(11) DEFAULT NULL,
  `ordem_servico_cliente_id` int(11) DEFAULT NULL,
  `ordem_servico_veiculo_id` int(11) DEFAULT NULL,
  `ordem_servico_data_emissao` timestamp NULL DEFAULT current_timestamp(),
  `ordem_servico_data_conclusao` date DEFAULT NULL,
  `ordem_servico_valor_desconto` varchar(25) DEFAULT NULL,
  `ordem_servico_valor_total` varchar(25) DEFAULT NULL,
  `ordem_servico_status` varchar(45) DEFAULT NULL,
  `ordem_servico_obs` tinytext DEFAULT NULL,
  `ordem_servico_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recibos_servicos`
--

CREATE TABLE `recibos_servicos` (
  `recibo_servico_id` int(11) NOT NULL,
  `recibo_servico_forma_pagamento_id` int(11) DEFAULT NULL,
  `recibo_servico_cliente_id` int(11) DEFAULT NULL,
  `recibo_servico_veiculo_id` int(11) DEFAULT NULL,
  `recibo_servico_data_emissao` timestamp NULL DEFAULT current_timestamp(),
  `recibo_servico_data_conclusao` date DEFAULT NULL,
  `recibo_servico_valor_desconto` varchar(25) DEFAULT NULL,
  `recibo_servico_valor_total` varchar(25) DEFAULT NULL,
  `recibo_servico_total_pago` varchar(25) DEFAULT NULL,
  `recibo_servico_troco` varchar(25) DEFAULT NULL,
  `recibo_servico_obs` tinytext DEFAULT NULL,
  `recibo_servico_data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recibo_tem_servicos`
--

CREATE TABLE `recibo_tem_servicos` (
  `recibo_ts_id` int(11) NOT NULL,
  `recibo_ts_id_servico` int(11) DEFAULT NULL,
  `recibo_ts_id_recibo_servico` int(11) DEFAULT NULL,
  `recibo_ts_quantidade` int(11) DEFAULT NULL,
  `recibo_ts_valor_unitario` varchar(45) DEFAULT NULL,
  `recibo_ts_valor_desconto` varchar(45) DEFAULT NULL,
  `recibo_ts_valor_total` varchar(45) DEFAULT NULL,
  `recibo_ts_total_pago` varchar(25) DEFAULT NULL,
  `recibo_ts_valor_troco` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de relacionamento entre as tabelas servicos e ordem_servico';

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `servico_id` int(11) NOT NULL,
  `servico_nome` varchar(145) DEFAULT NULL,
  `servico_preco` varchar(15) DEFAULT NULL,
  `servico_descricao` tinytext DEFAULT NULL,
  `servico_ativo` tinyint(1) DEFAULT NULL,
  `servico_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE `tipos` (
  `tipo_id` int(11) NOT NULL,
  `tipo_nome` varchar(45) NOT NULL,
  `tipo_ativo` tinyint(1) DEFAULT NULL,
  `tipo_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$cswAGxfUn42BWxcYbBOcVOBys8NQLuiMlqsWQrk5HcQI3QyhHkOfy', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1611340824, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '10.14.59.50', 'ffsoft', '$2y$12$qHLuuqcoMlSVxoVxOaGHXupIEo//fnUUgZ0Epcvm5C.QsfxSQKOYu', 'farleyfernando@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1610551593, 1612287802, 1, 'FARLEY', 'FERNANDO DOS SANTOS', NULL, '(18) 99185-2549');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(9, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `veiculo_id` int(11) NOT NULL,
  `veiculo_data_cadastro` datetime DEFAULT NULL,
  `veiculo_placa` varchar(10) NOT NULL,
  `veiculo_marca_modelo` varchar(100) NOT NULL,
  `veiculo_tipo_id` int(11) NOT NULL,
  `veiculo_uf` varchar(2) NOT NULL,
  `veiculo_especie_id` int(11) NOT NULL,
  `veiculo_cor_id` int(11) NOT NULL,
  `veiculo_combustivel_id` int(11) NOT NULL,
  `veiculo_fabricacao` varchar(15) NOT NULL,
  `veiculo_categoria_id` int(11) NOT NULL,
  `veiculo_chassi` varchar(100) NOT NULL,
  `veiculo_ano_fab` varchar(5) NOT NULL,
  `veiculo_ano_mod` varchar(5) NOT NULL,
  `veiculo_potencia` varchar(45) DEFAULT NULL,
  `veiculo_cilindros` varchar(45) DEFAULT NULL,
  `veiculo_cilindrada` varchar(45) DEFAULT NULL,
  `veiculo_lugares` int(5) DEFAULT NULL,
  `veiculo_renavam` varchar(20) NOT NULL,
  `veiculo_num_motor` varchar(45) DEFAULT NULL,
  `veiculo_mun_emp` varchar(100) DEFAULT NULL,
  `veiculo_chassi_rem` int(2) NOT NULL,
  `veiculo_prop_id` int(11) NOT NULL,
  `veiculo_venc_dut` date DEFAULT NULL,
  `veiculo_num_crv` varchar(45) DEFAULT NULL,
  `veiculo_dte_crv` date DEFAULT NULL,
  `veiculo_num_duda` int(11) DEFAULT NULL,
  `veiculo_obs` varchar(300) DEFAULT NULL,
  `veiculo_restricao` varchar(500) DEFAULT NULL,
  `veiculo_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`arquivo_id`),
  ADD KEY `fk_arquivo_cliente_id` (`arquivo_cliente_id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices para tabela `combustivel`
--
ALTER TABLE `combustivel`
  ADD PRIMARY KEY (`combustivel_id`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`conta_pagar_id`),
  ADD KEY `fk_conta_pagar_id_fornecedor` (`conta_pagar_fornecedor_id`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`conta_receber_id`),
  ADD KEY `fk_conta_receber_id_cliente` (`conta_receber_cliente_id`);

--
-- Índices para tabela `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`cor_id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`empresa_id`);

--
-- Índices para tabela `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`especie_id`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  ADD PRIMARY KEY (`forma_pagamento_id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`fornecedor_id`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  ADD PRIMARY KEY (`ordem_ts_id`),
  ADD KEY `fk_ordem_ts_id_servico` (`ordem_ts_id_servico`),
  ADD KEY `fk_ordem_ts_id_ordem_servico` (`ordem_ts_id_ordem_servico`);

--
-- Índices para tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  ADD PRIMARY KEY (`ordem_servico_id`),
  ADD KEY `fk_ordem_servico_id_cliente` (`ordem_servico_cliente_id`),
  ADD KEY `fk_ordem_servico_id_forma_pagto` (`ordem_servico_forma_pagamento_id`),
  ADD KEY `fk_ordem_servico_id_veiculo` (`ordem_servico_veiculo_id`);

--
-- Índices para tabela `recibos_servicos`
--
ALTER TABLE `recibos_servicos`
  ADD PRIMARY KEY (`recibo_servico_id`),
  ADD KEY `fk_ordem_servico_id_cliente` (`recibo_servico_cliente_id`),
  ADD KEY `fk_ordem_servico_id_forma_pagto` (`recibo_servico_forma_pagamento_id`),
  ADD KEY `fk_ordem_servico_id_veiculo` (`recibo_servico_veiculo_id`);

--
-- Índices para tabela `recibo_tem_servicos`
--
ALTER TABLE `recibo_tem_servicos`
  ADD PRIMARY KEY (`recibo_ts_id`),
  ADD KEY `fk_ordem_ts_id_servico` (`recibo_ts_id_servico`),
  ADD KEY `fk_ordem_ts_id_ordem_servico` (`recibo_ts_id_recibo_servico`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`servico_id`);

--
-- Índices para tabela `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`tipo_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`veiculo_id`),
  ADD KEY `fk_veiculo_tipo` (`veiculo_tipo_id`),
  ADD KEY `fk_veiculo_especie` (`veiculo_especie_id`),
  ADD KEY `fk_veiculo_cor` (`veiculo_cor_id`),
  ADD KEY `fk_veiculo_combustivel` (`veiculo_combustivel_id`),
  ADD KEY `fk_veiculo_categoria` (`veiculo_categoria_id`),
  ADD KEY `fk_veiculo_prop` (`veiculo_prop_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `arquivo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `combustivel`
--
ALTER TABLE `combustivel`
  MODIFY `combustivel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `conta_receber_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `cor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `especies`
--
ALTER TABLE `especies`
  MODIFY `especie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  MODIFY `forma_pagamento_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  MODIFY `ordem_ts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  MODIFY `ordem_servico_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `recibos_servicos`
--
ALTER TABLE `recibos_servicos`
  MODIFY `recibo_servico_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `recibo_tem_servicos`
--
ALTER TABLE `recibo_tem_servicos`
  MODIFY `recibo_ts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `servico_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipos`
--
ALTER TABLE `tipos`
  MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `veiculo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD CONSTRAINT `fk_arquivo_cliente_id` FOREIGN KEY (`arquivo_cliente_id`) REFERENCES `clientes` (`cliente_id`);

--
-- Limitadores para a tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD CONSTRAINT `fk_conta_pagar_id_fornecedor` FOREIGN KEY (`conta_pagar_fornecedor_id`) REFERENCES `fornecedores` (`fornecedor_id`);

--
-- Limitadores para a tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD CONSTRAINT `fk_conta_receber_id_cliente` FOREIGN KEY (`conta_receber_cliente_id`) REFERENCES `clientes` (`cliente_id`);

--
-- Limitadores para a tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  ADD CONSTRAINT `fk_ordem_servico_id_veiculo` FOREIGN KEY (`ordem_servico_veiculo_id`) REFERENCES `veiculos` (`veiculo_id`);

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `fk_veiculo_categoria` FOREIGN KEY (`veiculo_categoria_id`) REFERENCES `categorias` (`categoria_id`),
  ADD CONSTRAINT `fk_veiculo_combustivel` FOREIGN KEY (`veiculo_combustivel_id`) REFERENCES `combustivel` (`combustivel_id`),
  ADD CONSTRAINT `fk_veiculo_cor` FOREIGN KEY (`veiculo_cor_id`) REFERENCES `cores` (`cor_id`),
  ADD CONSTRAINT `fk_veiculo_especie` FOREIGN KEY (`veiculo_especie_id`) REFERENCES `especies` (`especie_id`),
  ADD CONSTRAINT `fk_veiculo_prop` FOREIGN KEY (`veiculo_prop_id`) REFERENCES `clientes` (`cliente_id`),
  ADD CONSTRAINT `fk_veiculo_tipo` FOREIGN KEY (`veiculo_tipo_id`) REFERENCES `tipos` (`tipo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
