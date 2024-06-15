-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/06/2024 às 03:08
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
-- Banco de dados: `bdveterinaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbanimal`
--

CREATE TABLE `tbanimal` (
  `codAnimal` int(11) NOT NULL,
  `nomeAnimal` varchar(100) NOT NULL,
  `fotoAnimal` varchar(255) DEFAULT NULL,
  `codTipoAnimal` int(11) DEFAULT NULL,
  `codCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbanimal`
--

INSERT INTO `tbanimal` (`codAnimal`, `nomeAnimal`, `fotoAnimal`, `codTipoAnimal`, `codCliente`) VALUES
(1, 'Bob', 'bob.jpg', 2, 2),
(2, 'Dog', 'a55141ac-a083-4a3c-a330-7774b94830b9.jpg', 2, 1),
(3, 'Docinho', '', 1, 3),
(4, 'Kyle', '', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbatendimento`
--

CREATE TABLE `tbatendimento` (
  `codAtendimento` int(11) NOT NULL,
  `dataAtendimento` date NOT NULL,
  `horaAtendimento` time NOT NULL,
  `codAnimal` int(11) DEFAULT NULL,
  `codVet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbatendimento`
--

INSERT INTO `tbatendimento` (`codAtendimento`, `dataAtendimento`, `horaAtendimento`, `codAnimal`, `codVet`) VALUES
(8, '2024-05-25', '11:30:00', 2, 1),
(9, '2024-05-15', '09:30:00', 1, 2),
(11, '2024-05-10', '09:34:00', 2, 1),
(12, '2024-06-14', '16:07:00', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `codCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `telefoneCliente` varchar(20) DEFAULT NULL,
  `emailCliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbcliente`
--

INSERT INTO `tbcliente` (`codCliente`, `nomeCliente`, `telefoneCliente`, `emailCliente`) VALUES
(1, 'Gabriel Duarte', '63 2525-3662', 'gabrielEmail@gmail.com'),
(2, 'Lucas Dias', '11 96261-4992', 'lucasDiasEmail@gmail.com'),
(3, 'Jack Morton', '17 98831-6521', 'cam201@scatterteam.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtipoanimal`
--

CREATE TABLE `tbtipoanimal` (
  `codTipoAnimal` int(11) NOT NULL,
  `tipoAnimal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbtipoanimal`
--

INSERT INTO `tbtipoanimal` (`codTipoAnimal`, `tipoAnimal`) VALUES
(1, 'Felino'),
(2, 'Cachorro'),
(3, 'Peixe');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbveterinario`
--

CREATE TABLE `tbveterinario` (
  `codVet` int(11) NOT NULL,
  `nomeVet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbveterinario`
--

INSERT INTO `tbveterinario` (`codVet`, `nomeVet`) VALUES
(1, 'Alexander Welker Biondo'),
(2, 'André Santos'),
(3, 'Fabiana Duarte');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD PRIMARY KEY (`codAnimal`),
  ADD KEY `codTipoAnimal` (`codTipoAnimal`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Índices de tabela `tbatendimento`
--
ALTER TABLE `tbatendimento`
  ADD PRIMARY KEY (`codAtendimento`),
  ADD KEY `codAnimal` (`codAnimal`),
  ADD KEY `codVet` (`codVet`);

--
-- Índices de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`codCliente`);

--
-- Índices de tabela `tbtipoanimal`
--
ALTER TABLE `tbtipoanimal`
  ADD PRIMARY KEY (`codTipoAnimal`);

--
-- Índices de tabela `tbveterinario`
--
ALTER TABLE `tbveterinario`
  ADD PRIMARY KEY (`codVet`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  MODIFY `codAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbatendimento`
--
ALTER TABLE `tbatendimento`
  MODIFY `codAtendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `codCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbtipoanimal`
--
ALTER TABLE `tbtipoanimal`
  MODIFY `codTipoAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbveterinario`
--
ALTER TABLE `tbveterinario`
  MODIFY `codVet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD CONSTRAINT `tbanimal_ibfk_1` FOREIGN KEY (`codTipoAnimal`) REFERENCES `tbtipoanimal` (`codTipoAnimal`),
  ADD CONSTRAINT `tbanimal_ibfk_2` FOREIGN KEY (`codCliente`) REFERENCES `tbcliente` (`codCliente`);

--
-- Restrições para tabelas `tbatendimento`
--
ALTER TABLE `tbatendimento`
  ADD CONSTRAINT `tbatendimento_ibfk_1` FOREIGN KEY (`codAnimal`) REFERENCES `tbanimal` (`codAnimal`),
  ADD CONSTRAINT `tbatendimento_ibfk_2` FOREIGN KEY (`codVet`) REFERENCES `tbveterinario` (`codVet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
