-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/01/2026 às 21:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `supermercado_japao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ofertas`
--

CREATE TABLE `ofertas` (
  `id_oferta` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `preco_oferta` decimal(10,2) NOT NULL,
  `percentual_desconto` int(11) DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `marca` varchar(150) NOT NULL,
  `categoria` varchar(150) DEFAULT NULL,
  `subcategoria` varchar(100) NOT NULL,
  `preco_venda` decimal(10,2) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `unidade_medida` varchar(50) NOT NULL,
  `tipo_venda` enum('unidade','kg') NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `descricao`, `marca`, `categoria`, `subcategoria`, `preco_venda`, `estoque`, `unidade_medida`, `tipo_venda`, `imagem`) VALUES
(6, 'Açúcar Refinado União 1kg', 'União Açúcar Refinado 1kg\r\n\r\n', 'União', 'Mercearia', 'Açúcares e Adoçantes', 8.99, 46, '1kg', 'unidade', 'img/produtos/693f24981f8af.png'),
(7, 'Bolo Ana Maria 35g Sabor Pão de Mel', 'Bolo Ana Maria - Sabor: Pão de Mel 35g', 'Ana Maria', 'Guloseimas e Confeitaria', 'Doces', 3.49, 46, '35g', 'unidade', 'img/produtos/693f2b27e88bb.png'),
(8, 'Arroz Branco Namorado 5kg Tipo 1', 'Arroz Branco Longo Fino Tipo 1 Namorado Pacote 5kg\r\n\r\n', 'Namorado', 'Alimentos Básicos', 'Arroz', 18.98, 100, '5kg', 'unidade', 'img/produtos/693f321104c04.png'),
(9, 'Wafer Recheio e Cobertura Chocolate Branco Lacta Bis Pacote 100,8g', 'Wafer Recheio e Cobertura Chocolate Branco Lacta Bis Pacote 100,8g 16 Unidades\r\n\r\n', 'Lacta', 'Mercearia', 'Bomboniere', 6.98, 105, '100,8g', 'unidade', 'img/produtos/693f3502d06f5.png'),
(10, 'Pão Bisnaguinha Original PANCO Pacote 300g', 'Pão Bisnaguinha Original - Pacote 300g PANCO\r\n', 'PANCO', 'Alimentos Básicos', 'Pães', 8.99, 49, '300g', 'unidade', 'img/produtos/693f36609129b.png'),
(11, 'Bombom Sortido Nestle Caixa 251g', 'Wafers, Bombom e Tabletes Sortidos Nestle Caixa 251g', 'Nestle', 'Mercearia', 'Bomboniere', 15.99, 64, '251g', 'unidade', 'img/produtos/693f384b5cacf.png'),
(12, 'Salgadinho Cheetos Assado Mix de Queijos 49g', 'Salgadinho Cheetos Assado 49g - Mix de Queijos', 'Cheetos', 'Guloseimas e Confeitaria', 'Salgadinhos', 4.99, 39, '49g', 'unidade', 'img/produtos/693f3af6482fd.png'),
(13, 'Biscoito Recheado Bauducco Ao Leite 80g', 'Biscoito Recheado Bauducco Choco Biscuit Ao Leite 80g\r\n\r\n', 'Bauducco', 'Guloseimas e Confeitaria', 'Biscoitos', 7.69, 98, '80g', 'unidade', 'img/produtos/693f3ec454e73.png'),
(14, 'Refrigerante Coca-cola 2l', 'Refrigerante Coca-cola Original Pet 2l\r\n\r\n', 'Coca-Cola', 'Bebidas Não Alcoólicas', 'Refrigerantes', 13.49, 50, '5l', 'unidade', 'img/produtos/693f3fec6c1c2.png'),
(15, 'Refrigerante Coca-cola Lata 350ml', 'Refrigerante Coca-Cola Tradicional Lata 350 ml\r\n\r\n\r\n', 'Coca-Cola', 'Bebidas Não Alcoólicas', 'Refrigerantes', 3.49, 233, '350ml', 'unidade', 'img/produtos/693f4bedb7f80.png'),
(16, 'Refrigerante Coca Cola 300ml', 'Refrigerante Coca Cola Original Pet 300ml\r\n', 'Coca-Cola', 'Bebidas Não Alcoólicas', 'Refrigerantes', 1.49, 223, '300ml', 'unidade', 'img/produtos/693f4da9cb2a9.png'),
(17, 'Salgadinho Doritos 300g', 'Salgadinho Doritos Original 300g\r\n', 'Doritos', 'Guloseimas e Confeitaria', 'Salgadinhos', 18.00, 45, '300g', 'unidade', 'img/produtos/693f4e76553fc.png'),
(18, 'Granulado Gotinhas de Coração Dr Oetker 80g', 'Granulado Gotinhas de Coração Dr Oetker 80g', 'Dr Oetker', 'Guloseimas e Confeitaria', 'Confeitaria', 4.99, 55, '80g', 'unidade', 'img/produtos/693f512882167.png'),
(19, 'Farinha de Trigo Tipo 1 Tradicional Dona Benta Pacote 1kg', 'Farinha de Trigo Enriquecida com Ferro e Ácido Fólico Tipo 1 Tradicional Dona Benta Pacote 1kg\r\n\r\n', 'Dona Benta', 'Alimentos Básicos', 'Farinhas e Farofas', 6.98, 44, '1kg', 'unidade', 'img/produtos/693f51d3c25ae.png'),
(20, 'Iorgute Batavo Natural Integral 170g', 'Iorgute Batavo Natural Integral 170g', 'Batavo', 'Matinais e Alimentos Infantis', 'Iorgutes', 2.99, 40, '170g', 'unidade', 'img/produtos/693f53b2efacc.png'),
(21, 'Kinder Ovo Chocolate Meninas Com 2 unidades 40g', 'Kinder Ovo Chocolate Meninas Com 2 unidades - Edição Bruxas e Acessórios 40g', 'Kinder Ovo', 'Guloseimas e Confeitaria', 'Chocolates', 22.99, 55, '40g', 'unidade', 'img/produtos/6940553d76c91.png'),
(22, 'Leite Piracanjuba Integral 1l', 'Leite Piracanjuba Integral 1l', 'Piracanjuba', 'Alimentos Básicos', 'Leites e Derivados', 4.79, 50, '1l', 'unidade', 'img/produtos/694055d8ed8e6.png'),
(23, 'Margarina Qualy Com Sal Pote 500g', 'Margarina Qualy - Com Sal 500g', 'Qualy', 'Matinais e Alimentos Infantis', 'Manteigas e Margarinas', 9.99, 99, '500g', 'unidade', 'img/produtos/69405663c03f4.png'),
(24, 'Mistura Para Bolo Festa Apti 400g', 'Mistura Para Bolo - Sabor: Festa Apti 400g', 'Apti', 'Guloseimas e Confeitaria', 'Confeitaria', 7.99, 44, '400g', 'unidade', 'img/produtos/694057b769902.png'),
(25, 'Leite Condensado Semidesnatado Moça Caixinha 395g', 'Descubra o sabor único de Moça que faz tudo dar certo desde 1921, agora em uma nova versão semi desnatada.\r\n\r\n', 'Moça', 'Guloseimas e Confeitaria', 'Confeitaria', 8.99, 58, '395g', 'unidade', 'img/produtos/6940586855991.png'),
(26, 'Energético Monster Energy 473ml', 'Energético Monster Energy 473ml', 'Monster', 'Bebidas Não Alcoólicas', 'Energéticos', 9.49, 4999, '473ml', 'unidade', 'img/produtos/69405901b92d8.png'),
(27, 'Energético Monster Zero Açúcar Lata 473ml', 'Energético Monster Zero Açúcar Lata 473ml', 'Monster', 'Bebidas Não Alcoólicas', 'Energéticos', 9.49, 200, '473ml', 'unidade', 'img/produtos/694059af99608.png'),
(28, 'Mini Panettone Bauducco 80g', 'Mini Panettone Bauducco com Frutas 80g\r\n\r\n', 'Bauducco', 'Guloseimas e Confeitaria', 'Doces', 5.99, 90, '80g', 'unidade', 'img/produtos/69405cf266f10.png'),
(29, 'Panettone Com Gotas de Chocolate PANCO Caixa 400g', 'Panettone Com Gotas de Chocolate PANCO Caixa 400g', 'PANCO', 'Guloseimas e Confeitaria', 'Doces', 22.99, 399, '400g', 'unidade', 'img/produtos/69405f0e1571d.png'),
(30, 'Pão de Forma Visconti Tradicional 400g', 'Pão de Forma Tradicional Visconti 400g\r\n\r\n', 'Visconti', 'Padaria', 'Pães', 6.99, 33, '400g', 'unidade', 'img/produtos/694060c1551ae.png'),
(31, 'Papel Higiênico Mili Folha Tripla Prime Com 4 Rolos | 20m', 'Papel Higiênico Mili Folha Tripla Prime Com 4 Rolos | 20m', 'Mili', 'Limpeza e Lavanderia', 'Banheiro', 7.59, 200, '', 'unidade', 'img/produtos/694062231528b.png'),
(32, 'Sabão Em Pó Omo 1,6kg', 'Sabão Em Pó Omo Lavagem Rápida 1,6kg\r\n\r\n', 'Omo', 'Limpeza e Lavanderia', 'Lavanderia', 28.99, 30, '1,6kg', 'unidade', 'img/produtos/69406369a6439.png'),
(33, 'Saco Para Lixo Prático 100l', 'Saco Para Lixo Prático 100l Contém 10 Unidades', 'Prático', 'Limpeza e Lavanderia', 'Lavanderia', 6.49, 400, '', 'unidade', 'img/produtos/6940643f64229.png'),
(34, 'Suco Natural One Laranja e Maçã 180ml', 'Suco Natural One - Sabor: Laranja e Maçã 180ml', 'Natural One', 'Bebidas Não Alcoólicas', 'Sucos', 5.99, 60, '180ml', 'unidade', 'img/produtos/694065dfd6b21.png'),
(35, 'Salgadinho Takis Fuego 280g', 'Salgadinho Takis Fuego 280g', 'Takis', 'Guloseimas e Confeitaria', 'Salgadinhos', 9.99, 500, '280g', 'unidade', 'img/produtos/694067924efcb.png'),
(36, 'Refresco Em Pó Tang Azul Espacial 18g', 'Refresco Em Pó Tang Edição Especial do Stich - Azul Espacial 18g', 'Tang', 'Bebidas Não Alcoólicas', 'Sucos', 1.29, 49, '18g', 'unidade', 'img/produtos/694068e499434.png'),
(37, 'Achocolatado Em Pó Toddy 370g', 'Achocolatado Em Pó Toddy 370g', 'Toddy', 'Matinais e Alimentos Infantis', 'Achocolatados', 10.99, 56, '370g', 'unidade', 'img/produtos/694069988f76b.png'),
(38, 'Bebida Láctea UHT Chocolate Toddynho Caixa 200ml', 'Bebida Láctea UHT de Chocolate Toddynho Caixa 200ml', 'Toddynho', 'Matinais e Alimentos Infantis', 'Leites e Derivados', 3.19, 50, '200ml', 'unidade', 'img/produtos/69406a9e064d1.png'),
(39, 'Goma de Mascar Trident Melancia Sem Açúcar 25,2g', 'Goma de Mascar Trident Melancia Sem Açúcar 25,2g | 14 Unidades', 'Trident', 'Guloseimas e Confeitaria', 'Doces', 7.99, 400, '25,2g', 'unidade', 'img/produtos/69406b7386ff8.png'),
(40, 'Leite Fermentado Desnatado e Adoçado Yakult 480g', 'Leite Fermentado Desnatado e Adoçado Yakult 480g | 6 Unidades', 'Yakult', 'Matinais e Alimentos Infantis', 'Leites e Derivados', 11.99, 34, '480g', 'unidade', 'img/produtos/69406c5f2e5d4.png'),
(41, 'Amaciante Concentrado Ypê Blue Garden 500ml', 'Amaciante Concentrado Ypê - Blue Garden 500ml', 'Ypê', 'Limpeza e Lavanderia', 'Roupa', 9.99, 40, '500ml', 'unidade', 'img/produtos/69406d9a92961.png'),
(42, 'Detergente Líquido Ypê Neutro 500ml', 'Detergente Líquido Ypê Neutro 500ml', 'Ypê', 'Limpeza e Lavanderia', 'Cozinha', 2.49, 30, '500ml', 'unidade', 'img/produtos/69406e2f2651e.png'),
(44, 'Banana Nanica A Granel Kg', 'Banana Nanica A Granel Kg', '', 'Hortifruti', 'Frutas', 6.99, 100, '', 'kg', 'img/produtos/69407e2c03f74.png'),
(45, 'Carne Moída', 'Carne Moída kg', '', 'Açougue', 'Bovino', 34.98, 4000, '', 'kg', 'img/produtos/69407f0cca8b4.png'),
(46, 'Mortadela Perdigão Ouro Fatiada', 'Mortadela Perdigão Ouro Fatiada kg', 'Perdigão Ouro', 'Frios e Embutidos', 'Frios', 19.90, 9999, '', 'kg', 'img/produtos/694082aaaa6a8.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `endereco` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `senha`, `telefone`, `data_nascimento`, `cpf`, `tipo_usuario`, `data_criacao`, `endereco`) VALUES
(1, 'Higor', 'blackgamestory@gmail.com', '$2y$10$i28FuXA0r1Dfvdm1/d2Beudx7bkFKfDrxsdxnu9x1/EfHID5dWRBy', '11958962265', '2006-03-15', '43461763802', 'admin', '2025-12-09 22:11:05', 'Avenida Francisco');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `fk_oferta_produto` (`id_produto`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `fk_oferta_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
