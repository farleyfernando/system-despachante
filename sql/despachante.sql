-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Fev-2021 às 19:40
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

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`arquivo_id`, `arquivo_files`, `arquivo_url`, `arquivo_cliente_id`) VALUES
(1, 'storage/files/2021/01/camscanner-11-30-2020-10-40.pdf', NULL, 2),
(2, 'storage/files/2021/01/anexos.pdf', NULL, 3),
(4, 'storage/files/2021/02/nf-aspirador.pdf', NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `id_venda`, `id_produto`, `cpf`, `quantidade`) VALUES
(291, 101, 20, '273.338.568-28', 7),
(292, 101, 17, '273.338.568-28', 6),
(294, 102, 13, '273.338.568-28', 7),
(295, 102, 1, '273.338.568-28', 4),
(297, 103, 10, '273.338.568-28', 6),
(298, 103, 16, '273.338.568-28', 4),
(319, 104, 30, '273.338.568-28', 1),
(320, 104, 29, '273.338.568-28', 1),
(321, 104, 28, '273.338.568-28', 1),
(322, 104, 27, '273.338.568-28', 2),
(323, 104, 19, '273.338.568-28', 2),
(332, 105, 30, '000.000.000-10', 1),
(333, 105, 31, '000.000.000-10', 2),
(336, 106, 24, '000.000.000-10', 8),
(337, 106, 26, '000.000.000-10', 3),
(341, 108, 23, '000.000.000-10', 2),
(342, 108, 26, '000.000.000-10', 3),
(344, 109, 24, '000.000.000-10', 8),
(345, 109, 25, '000.000.000-10', 2),
(347, 110, 14, '000.000.000-10', 2),
(348, 110, 18, '000.000.000-10', 3),
(351, 112, 25, '315.374.768-74', 2),
(352, 112, 15, '315.374.768-74', 2),
(353, 112, 23, '315.374.768-74', 1),
(355, 113, 23, '273.338.568-28', 1),
(356, 113, 26, '273.338.568-28', 3),
(358, 114, 24, '273.338.568-28', 8),
(359, 114, 12, '273.338.568-28', 1),
(360, 115, 25, '273.338.568-28', 2),
(361, 115, 22, '273.338.568-28', 1),
(364, 116, 14, '273.338.568-28', 1),
(365, 117, 15, '273.338.568-28', 1),
(366, 117, 23, '273.338.568-28', 1),
(367, 118, 22, '273.338.568-28', 1),
(368, 118, 19, '273.338.568-28', 2),
(369, 119, 14, '273.338.568-28', 1),
(370, 120, 19, '273.338.568-28', 2),
(371, 121, 18, '273.338.568-28', 3),
(372, 122, 31, '273.338.568-28', 1),
(373, 123, 28, '273.338.568-28', 1),
(375, 124, 23, '273.338.568-28', 1),
(376, 125, 30, '273.338.568-28', 1),
(377, 126, 25, '273.338.568-28', 2),
(378, 126, 26, '273.338.568-28', 3),
(379, 127, 29, '273.338.568-28', 1),
(394, 128, 23, '000.000.000-10', 1),
(395, 128, 29, '000.000.000-10', 1),
(396, 128, 28, '000.000.000-10', 2),
(445, 129, 23, '000.000.000-00', 1),
(446, 129, 26, '000.000.000-00', 3),
(447, 130, 24, '000.000.000-00', 8),
(448, 130, 26, '000.000.000-00', 3),
(473, 131, 19, '000.000.000-10', 1),
(474, 131, 14, '000.000.000-10', 1),
(476, 132, 24, '000.000.000-10', 1),
(480, 0, 14, '315.374.768-74', 1);

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

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nome`, `categoria_ativa`, `categoria_data_alteracao`) VALUES
(1, 'PARTICULAR', 1, '2021-01-22 19:36:38');

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

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_data_cadastro`, `cliente_tipo`, `cliente_nome`, `cliente_sobrenome`, `cliente_dn`, `cliente_cpf_cnpj`, `cliente_rg_ie`, `cliente_email`, `cliente_telefone`, `cliente_celular`, `cliente_cep`, `cliente_endereco`, `cliente_num_end`, `cliente_bairro`, `cliente_complemento`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_obs`, `cliente_data_alteracao`) VALUES
(1, '2021-01-15 01:36:50', 2, 'FERNANDO ARAUJO', 'SMARTCEL ME', '2021-10-17', '71.045.771/0001-43', '432.354.644.111', 'smartcel@uol.com.br', '(18) 3281-1111', '(18) 98191-1111', '19470-000', 'centro', '3154', 'jd real 2', 'casa', 'Presidente Epitácio', 'SP', 1, 'teste', '2021-01-25 21:33:04'),
(2, '2021-01-22 03:44:28', 1, 'FARLEYY', 'FERNANDO DOS SANTOS', '1984-01-02', '315.374.768-74', '33.431.110-0', 'farleyfernando@hotmail.com', '(18) 9813-5011', '(18) 99185-2548', '19470-000', 'Rio de Janeiro', '3428', 'Jd Real II', 'casa', 'Presidente Epitácio', 'SP', 1, 'teste', '2021-02-01 22:22:41'),
(3, '2021-01-22 03:55:11', 1, 'ANA', 'PAULA DA MOTA', '2021-01-12', '273.338.568-28', '56.465.465-4', 'aninnha_30@hotmail.com', '(18) 9819-1365', '(65) 46545-6456', '19470-000', 'RUA RIO DE JANEIRO', '3428', 'Jd Real II', 'casa', 'Presidente Epitácio', 'SP', 1, 'teste', '2021-01-25 21:29:29'),
(5, '2021-01-22 13:36:47', 2, 'JIUVAN', 'JIUVAN DESPACHANTE', '1984-05-02', '38.577.095/0001-83', '543513325', 'hiuvan@uol.com', '(15) 6465-4546', '(65) 46546-4566', '19470-000', 'Fortaleza', '24', 'centro', 'N/T', 'Presidente Epitácio', 'SP', 1, 'NT', '2021-01-22 13:36:47'),
(6, '2021-01-22 13:38:15', 1, 'CATHARINA', 'DA MOTA', '2014-05-27', '195.778.290-07', '65.954.545-4', 'cath@gmail.com', '(15) 1546-4546', '(45) 46546-4656', '19470-000', 'RJ', '24', 'jd real II', 'casa', 'Presidente Epitácio', 'SP', 0, 'teste', '2021-01-22 13:38:15');

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

--
-- Extraindo dados da tabela `combustivel`
--

INSERT INTO `combustivel` (`combustivel_id`, `combustivel_nome`, `combustivel_ativo`, `combustivel_data_alteracao`) VALUES
(1, 'ETANOL', 1, '2021-01-24 16:54:50'),
(2, 'GASOLINA', 1, '2021-01-24 16:54:50'),
(3, 'FLEX', 1, '2021-01-24 17:05:01');

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

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`conta_pagar_id`, `conta_pagar_fornecedor_id`, `conta_pagar_data_venc`, `conta_pagar_data_pagamento`, `conta_pagar_valor`, `conta_pagar_status`, `conta_pagar_obs`, `conta_pagar_data_alteracao`) VALUES
(1, 1, '2021-01-26', '2021-01-25 22:53:13', '800.01', 1, '', '2021-01-26 01:53:13'),
(2, 2, '2021-01-31', NULL, '540.00', 0, 'Prestador de serviço - SysDES', '2021-01-31 17:47:24');

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

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`conta_receber_id`, `conta_receber_cliente_id`, `conta_receber_data_venc`, `conta_receber_data_pagamento`, `conta_receber_valor`, `conta_receber_status`, `conta_receber_obs`, `conta_receber_data_alteracao`) VALUES
(1, 1, '2021-01-31', '2020-02-28 17:48:21', '150,226.22', 0, '', '2021-01-31 17:56:33'),
(2, 2, '2020-02-21', '2020-02-28 18:33:19', '350.00', 1, NULL, '2020-02-28 21:33:19'),
(3, 3, '2020-02-28', '2020-02-28 17:22:47', '56.00', 1, NULL, '2020-02-28 20:22:47'),
(4, 6, '2021-01-26', NULL, '45.00', 0, 'teste', '2021-01-26 14:41:07');

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

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`cor_id`, `cor_nome`, `cor_ativo`, `cor_data_alteracao`) VALUES
(1, 'BRANCO', 1, '2021-01-22 20:27:18'),
(2, 'PRETO', 1, '2021-01-22 20:30:07'),
(3, 'PRATA', 1, '2021-01-25 21:48:35');

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

--
-- Extraindo dados da tabela `especies`
--

INSERT INTO `especies` (`especie_id`, `especie_nome`, `especie_ativo`, `especie_data_alteracao`) VALUES
(1, 'PASSAGEIRO', 1, '2021-01-24 17:29:02'),
(2, 'TRACAO', 1, '2021-01-24 17:29:02'),
(3, 'MISTO', 1, '2021-01-24 17:52:31');

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

--
-- Extraindo dados da tabela `formas_pagamentos`
--

INSERT INTO `formas_pagamentos` (`forma_pagamento_id`, `forma_pagamento_nome`, `forma_pagamento_aceita_parc`, `forma_pagamento_ativa`, `forma_pagamento_data_alteracao`) VALUES
(1, 'CARTÃO DÉBITO', 0, 1, '2021-01-26 14:55:13'),
(2, 'CARTÃO CRÉDITO', 1, 1, '2021-01-26 14:55:06'),
(4, 'BOLETO', 1, 1, '2021-01-26 14:54:09');

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

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`fornecedor_id`, `fornecedor_data_cadastro`, `fornecedor_tipo`, `fornecedor_nome`, `fornecedor_sobrenome`, `fornecedor_dn`, `fornecedor_cpf_cnpj`, `fornecedor_rg_ie`, `fornecedor_email`, `fornecedor_telefone`, `fornecedor_celular`, `fornecedor_cep`, `fornecedor_endereco`, `fornecedor_num_end`, `fornecedor_bairro`, `fornecedor_complemento`, `fornecedor_cidade`, `fornecedor_estado`, `fornecedor_ativo`, `fornecedor_obs`, `fornecedor_data_alteracao`) VALUES
(1, '2021-01-15 01:36:50', 2, 'FERNANDO ARAUJO', 'SMARTCEL ME', '2021-10-17', '71.045.771/0001-43', '432.354.644.111', 'smartcel@uol.com.br', '(18) 3281-1111', '(18) 98191-1111', '19470-000', 'centro', '3154', 'jd real 2', 'casa', 'Presidente Epitácio', 'SP', 1, 'teste', '2021-01-25 21:33:04'),
(2, '2021-01-22 03:44:28', 1, 'FARLEY', 'FERNANDO DOS SANTOS', '1984-01-02', '315.374.768-74', '33.431.110-0', 'farleyfernando@hotmail.com', '(18) 9813-5011', '(18) 99185-2548', '19470-000', 'Rio de Janeiro', '3428', 'Jd Real II', 'casa', 'Presidente Epitácio', 'SP', 1, 'teste', '2021-01-22 03:55:49'),
(7, '2021-01-25 23:37:14', 1, 'ANA', 'PAULA DA MOTA', '1978-03-17', '273.338.568-28', '24.568.745-2', 'aninnha_30@uol.com', '(18) 3281-5621', '(18) 98191-3652', '19470-000', 'Rio de janiero', '3428', 'Jd real II', 'casa', 'Presidente Epitácio', 'SP', 1, 'teste', '2021-01-25 23:37:14'),
(8, '2021-01-25 23:39:34', 2, 'JOSE SANTOS ME', 'GRAFICA PONTAL', '2021-01-02', '03.793.167/0001-45', '125.245.847.547', 'grafica@uol.com', '(18) 2154-2152', '(18) 21316-5654', '17700-000', 'Jose Foz', '32', 'Centro', 'comercio', 'Osvaldo Cruz', 'SP', 1, '', '2021-01-25 23:39:34');

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

--
-- Extraindo dados da tabela `ordem_tem_servicos`
--

INSERT INTO `ordem_tem_servicos` (`ordem_ts_id`, `ordem_ts_id_servico`, `ordem_ts_id_ordem_servico`, `ordem_ts_quantidade`, `ordem_ts_valor_unitario`, `ordem_ts_valor_desconto`, `ordem_ts_valor_total`) VALUES
(8, 4, 1, 1, ' 50.00', '0 ', ' 50.00'),
(13, 2, 2, 1, ' 187.50', '0 ', ' 187.50'),
(14, 1, 3, 2, ' 180.00', '0 ', ' 360.00'),
(15, 2, 3, 1, ' 187.50', '0 ', ' 187.50'),
(16, 2, 4, 1, ' 187.50', '0 ', ' 187.50'),
(17, 5, 5, 1, ' 80.00', '0 ', ' 80.00'),
(20, 5, 6, 1, ' 80.00', '0 ', ' 80.00'),
(21, 3, 7, 1, ' 120.80', '0 ', ' 120.80'),
(24, 2, 8, 1, ' 187.50', '0 ', ' 187.50'),
(25, 2, 9, 1, ' 187.50', '0 ', ' 187.50');

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

--
-- Extraindo dados da tabela `ordens_servicos`
--

INSERT INTO `ordens_servicos` (`ordem_servico_id`, `ordem_servico_forma_pagamento_id`, `ordem_servico_cliente_id`, `ordem_servico_veiculo_id`, `ordem_servico_data_emissao`, `ordem_servico_data_conclusao`, `ordem_servico_valor_desconto`, `ordem_servico_valor_total`, `ordem_servico_status`, `ordem_servico_obs`, `ordem_servico_data_alteracao`) VALUES
(1, 2, 3, 1, '2021-01-28 20:30:25', NULL, 'R$ 0.00', '50.00', 'CONCLUIDO', 'teste', '2021-01-29 23:17:42'),
(8, 1, 2, 2, '2021-01-29 23:37:14', NULL, 'R$ 0.00', '187.50', 'AGENDAMENTO', '', '2021-01-30 02:21:59'),
(9, 1, 5, 1, '2021-02-01 20:32:48', NULL, 'R$ 0.00', '187.50', 'AGENDAMENTO', '', NULL);

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

--
-- Extraindo dados da tabela `recibos_servicos`
--

INSERT INTO `recibos_servicos` (`recibo_servico_id`, `recibo_servico_forma_pagamento_id`, `recibo_servico_cliente_id`, `recibo_servico_veiculo_id`, `recibo_servico_data_emissao`, `recibo_servico_data_conclusao`, `recibo_servico_valor_desconto`, `recibo_servico_valor_total`, `recibo_servico_total_pago`, `recibo_servico_troco`, `recibo_servico_obs`, `recibo_servico_data_alteracao`) VALUES
(2, 1, 2, 1, '2021-01-26 15:06:09', NULL, 'R$ 0.00', '50.00', '100', '50', 'teste', '2021-01-26 20:36:01'),
(3, 1, 5, 2, '2021-01-26 22:48:40', NULL, 'R$ 0.00', '187.50', '250', '62.5', 'N/T', '2021-01-27 03:57:31'),
(9, 1, 3, 1, '2021-01-28 01:01:05', NULL, 'R$ 0.00', '50.00', '100', '50', 'te', NULL),
(10, 1, 3, 2, '2021-01-28 01:03:29', NULL, 'R$ 0.00', '100.00', '150', '50', 'teste', NULL),
(11, 1, 3, 1, '2021-01-28 01:09:13', NULL, 'R$ 0.00', '0.00', '210', '30', 'teste', NULL),
(13, 2, 1, 2, '2021-01-28 01:12:48', NULL, 'R$ 0.00', '80.00', '200', '120', '', NULL),
(14, 2, 2, 2, '2021-01-28 01:13:26', NULL, 'R$ 0.00', '337.50', '350', '12.5', 'teste2', NULL),
(16, 1, 3, 1, '2021-01-28 18:53:19', NULL, 'R$ 0.00', '50.00', '100', '50', 'teste', NULL),
(17, 2, 1, 1, '2021-01-29 22:33:22', NULL, 'R$ 18.75', '168.75', '200', '31.25', NULL, NULL);

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

--
-- Extraindo dados da tabela `recibo_tem_servicos`
--

INSERT INTO `recibo_tem_servicos` (`recibo_ts_id`, `recibo_ts_id_servico`, `recibo_ts_id_recibo_servico`, `recibo_ts_quantidade`, `recibo_ts_valor_unitario`, `recibo_ts_valor_desconto`, `recibo_ts_valor_total`, `recibo_ts_total_pago`, `recibo_ts_valor_troco`) VALUES
(1, 1, 1, 1, ' 80.00', '0 ', ' 80.00', '100', '20.00'),
(9, 4, 2, 1, ' 50.00', '0 ', ' 50.00', '100', '50'),
(11, 2, 7, 1, ' 187.50', '0 ', ' 187.50', '200', '12.5'),
(29, 2, 3, 1, '187.50', '0 ', ' 187.50', '250', '62.5'),
(32, 1, 8, 1, '0.18', '0 ', ' 0.18', '200', '12.32'),
(33, 2, 8, 1, '187.50', '0 ', ' 0.00', '200', '12.32'),
(39, 4, 10, 2, '50.00', '0 ', ' 100.00', '150', '50'),
(42, 4, 12, 1, ' 50.00', '0 ', ' 50.00', '100', '50'),
(59, 2, 14, 1, ' 187.50', '0 ', ' 187.50', '350', '12.5'),
(60, 4, 14, 3, ' 50.00', '0 ', ' 150.00', '350', '12.5'),
(65, 1, 11, 1, '.180.00', '0 ', ' 0.00', '210', '30'),
(66, 4, 9, 1, ' 50.00', '0 ', ' 50.00', '100', '50'),
(67, 5, 13, 1, ' 80.00', '0 ', ' 80.00', '200', '120'),
(69, 4, 16, 1, ' 50.00', '0 ', ' 50.00', '100', '50'),
(70, 2, 17, 1, ' 187.50', '10 ', ' 168.75', '200', '31.25');

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

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`servico_id`, `servico_nome`, `servico_preco`, `servico_descricao`, `servico_ativo`, `servico_data_alteracao`) VALUES
(1, 'Par de Placa automóvel', '190.00', 'Par de placas automóvel', 1, '2021-02-01 20:43:31'),
(2, 'Taxa Transferência', '187.50', 'Taxa transferência', 1, '2021-02-01 20:45:27'),
(3, '2 via CRV', '120,80', '2 Via CRV', 1, '2021-01-28 03:07:26'),
(4, 'Taxa de serviços em geral', '50,00', 'Taxa de serviços em geral.', 1, '2021-01-28 03:07:21'),
(5, 'VISTORIA', '80,00', 'VISTORIA DE VEICULOS', 1, '2021-01-28 03:07:17');

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

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`tipo_id`, `tipo_nome`, `tipo_ativo`, `tipo_data_alteracao`) VALUES
(1, 'MOTOCICLETA', 1, '2021-01-23 04:04:49'),
(2, 'AUTOMOVEL', 1, '2021-01-23 04:15:42');

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
(2, '10.14.59.50', 'ffsoft', '$2y$12$qHLuuqcoMlSVxoVxOaGHXupIEo//fnUUgZ0Epcvm5C.QsfxSQKOYu', 'farleyfernando@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1610551593, 1612287802, 1, 'FARLEY', 'FERNANDO DOS SANTOS', NULL, '(18) 99185-2549'),
(3, '10.14.59.50', 'aninnha', '$2y$10$cWLccDoK8LQ2t3T1wifvi.5MSiR1f3ndQ1AgWjws3PiJtyqdyKAhi', 'aninnha_30@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1610552579, 1612127656, 1, 'ANA', 'PAULA DA MOTA SOUZA', NULL, '(19) 84546-5411'),
(4, '10.14.59.50', 'jose', '$2y$10$uVjJOzbXhoDY1pXgYDtgGeiOr86kBLMniT9359KqKFrvQxDDlw8WC', 'joao@uol.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1610553620, 1611340990, 1, 'JOÃO', 'FERREIRA DOS SANTOS', NULL, '(18) 45644-6544'),
(9, '10.14.59.50', 'joana', '$2y$10$6/.MJHYEk3M7rghHxgOZeuoyamhMmlGQYVuZRcPh/BhrRiQSVyRAi', 'joana@uol.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1610642372, NULL, 1, 'JOANA', 'FERREIRA DOS SANTOS', NULL, '(15) 66546-5465'),
(10, '10.14.59.50', 'tiago_f', '$2y$10$HgtS5/xmp5tOVp9c.P8c0u6d9VVzLTkW5VkDXt/WxK8fRMUOL91Ra', 'tiago@hotmail.com.br', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1610652910, NULL, 1, 'TIAGO FERNANDO', 'JOSE DE FREITAS OLIVEIRA', NULL, '(18) 25556-4650'),
(11, '::1', 'leonardo', '$2y$10$K0jdC1RrcWLkNxb08QqScey/TyAgRDj1L.244p.vMI8qRw5G20BR6', 'LEO@UOL.COM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1610730184, NULL, 1, 'LEONARDO', 'DOS SANTOS', NULL, '(23) 12321-3213');

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
(9, 2, 1),
(13, 3, 2),
(5, 4, 2),
(15, 9, 2),
(16, 10, 1),
(17, 11, 2);

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
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`veiculo_id`, `veiculo_data_cadastro`, `veiculo_placa`, `veiculo_marca_modelo`, `veiculo_tipo_id`, `veiculo_uf`, `veiculo_especie_id`, `veiculo_cor_id`, `veiculo_combustivel_id`, `veiculo_fabricacao`, `veiculo_categoria_id`, `veiculo_chassi`, `veiculo_ano_fab`, `veiculo_ano_mod`, `veiculo_potencia`, `veiculo_cilindros`, `veiculo_cilindrada`, `veiculo_lugares`, `veiculo_renavam`, `veiculo_num_motor`, `veiculo_mun_emp`, `veiculo_chassi_rem`, `veiculo_prop_id`, `veiculo_venc_dut`, `veiculo_num_crv`, `veiculo_dte_crv`, `veiculo_num_duda`, `veiculo_obs`, `veiculo_restricao`, `veiculo_data_alteracao`) VALUES
(1, '2021-01-24 16:44:40', 'EVF-1214', 'FORD/NEW FISTA SEDAN1.7', 2, 'SP', 1, 3, 3, 'IMPORTADO', 1, '3FADP4BK3BM217794', '2010', '2010', '111CV', 'n/t', '1600', 4, '003431888499', 'BM21779333', 'PRESIDENTE EPITÁCIOO', 1, 2, '2021-01-31', '46661234182020', '2021-01-22', 1111, 'ALIENADO: BV FINANCEIRAA', 'N/T', '2021-01-24 19:51:20'),
(2, NULL, 'EWE-9860', 'DAFRA/RIVA 150', 1, 'SP', 1, 2, 2, 'NACIONAL', 1, '95VC02D2CDM000688', '2012', '2013', '0CV', 'n/a', '150', 2, '00484462075', 'C1DC003948', 'PRESIDENTE EPITáCIO', 0, 3, '2021-01-28', '71646440556', '2021-01-14', 0, 'SEM RESERVA', 'NT', '2021-01-25 21:38:47');

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
  MODIFY `arquivo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `combustivel`
--
ALTER TABLE `combustivel`
  MODIFY `combustivel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `conta_receber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `cor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `especies`
--
ALTER TABLE `especies`
  MODIFY `especie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  MODIFY `forma_pagamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `ordem_ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  MODIFY `ordem_servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `recibos_servicos`
--
ALTER TABLE `recibos_servicos`
  MODIFY `recibo_servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `recibo_tem_servicos`
--
ALTER TABLE `recibo_tem_servicos`
  MODIFY `recibo_ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tipos`
--
ALTER TABLE `tipos`
  MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `veiculo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
