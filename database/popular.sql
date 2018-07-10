-- FUNCIONARIO
INSERT INTO `funcionario`(`cpf`, `senha_funcionario`, `nome_funcionario`) VALUES ('212.105.558-40', 'jose1234', 'José da Silva');

INSERT INTO `funcionario`(`cpf`, `senha_funcionario`, `nome_funcionario`) VALUES ('224.468.778-34', 'joao1234', 'João Pereira');

INSERT INTO `funcionario`(`cpf`, `senha_funcionario`, `nome_funcionario`) VALUES ('391.462.588-09', 'rita1234', 'Rita Rodrigues');

INSERT INTO `funcionario`(`cpf`, `senha_funcionario`, `nome_funcionario`) VALUES ('260.417.338-73', 'carla1234', 'Carla Regina Santos');

INSERT INTO `funcionario`(`cpf`, `senha_funcionario`, `nome_funcionario`) VALUES ('386.201.808-35', 'celia1234', 'Célia Cristina Rocha');

INSERT INTO `funcionario`(`cpf`, `senha_funcionario`, `nome_funcionario`) VALUES ('587.234.728-63', 'marcelo1234', 'Marcelo Andrade');

-- ALUNO
INSERT INTO `aluno`(`ra`, `nome_aluno`, `email_resp`, `nome_resp`, `tel_resp`, `senha_aluno`, `funcionario_cpf`)
	VALUES (9759, 'Kaique Bento Nascimento', 'aparecidaregina@gmail.com', 'Aparecida Regina', '(16) 99882-0430', 'kaique1234', '391.462.588-09');

INSERT INTO `aluno`(`ra`, `nome_aluno`, `email_resp`, `nome_resp`, `tel_resp`, `senha_aluno`, `funcionario_cpf`)
 VALUES (3581, 'Alícia Maitê Aragão', 'rafaelaragao@gmail.com', 'Rafael Vitor Aragão', '(16) 98643-1032', 'alicia1234', '260.417.338-73');

INSERT INTO `aluno`(`ra`, `nome_aluno`, `email_resp`, `nome_resp`, `tel_resp`, `senha_aluno`, `funcionario_cpf`)
 VALUES (7922, 'Enrico Rodrigo Jorge Pires', 'bernardopires@gmail.com', 'Bernardo Elias Pires', '(16) 99814-3008', 'enrico1234', '391.462.588-09');

INSERT INTO `aluno`(`ra`, `nome_aluno`, `email_resp`, `nome_resp`, `tel_resp`, `senha_aluno`, `funcionario_cpf`)
	VALUES (1777, 'Mirella Luciana Ribeiro', 'fatimaclara@gmail.com', 'Fátima Stefany Clara', '(16) 98233-2953', 'mirella1234', '260.417.338-73');

INSERT INTO `aluno`(`ra`, `nome_aluno`, `email_resp`, `nome_resp`, `tel_resp`, `senha_aluno`, `funcionario_cpf`)
 VALUES (2661, 'João Ricardo Sérgio Melo', 'danielaluana@gmail.com', 'Daniela Luana', '(16) 99513-8214', 'joaoricardo1234', '224.468.778-34');

INSERT INTO `aluno`(`ra`, `nome_aluno`, `email_resp`, `nome_resp`, `tel_resp`, `senha_aluno`, `funcionario_cpf`)
 VALUES (8624, 'Débora Agatha Pereira', 'danielaluana@gmail.com', 'Daniela Luana', '(16) 99513-8214', 'debora1234', '587.234.728-63');

-- PRODUTO
INSERT INTO `produto`(`preco`, `nome_produto`) VALUES ('3.00', 'Salgado Frito');

INSERT INTO `produto`(`preco`, `nome_produto`) VALUES ('3.50', 'Salgado Assado');

INSERT INTO `produto`(`preco`, `nome_produto`) VALUES ('1.50', 'Água Sem Gás');

INSERT INTO `produto`(`preco`, `nome_produto`) VALUES ('2.00', 'Água Com Gás');

INSERT INTO `produto`(`preco`, `nome_produto`) VALUES ('4.00', 'Refrigerante Cola Lata');

INSERT INTO `produto`(`preco`, `nome_produto`) VALUES ('4.00', 'Refrigerante Guaraná Lata');

INSERT INTO `produto`(`preco`, `nome_produto`) VALUES ('6.75', 'Chocolate ao Leite 90g');

INSERT INTO `produto`(`preco`, `nome_produto`) VALUES ('0.75', 'Bala de Goma Diversas (un)');

-- REGISTRO_VENDA
INSERT INTO `registro_venda`(`data`, `funcionario_cpf`, `aluno_ra`)
 VALUES ('2018-07-05','391.462.588-09',9759);

INSERT INTO `registro_venda`(`data`, `funcionario_cpf`, `aluno_ra`)
 VALUES ('2018-07-05','260.417.338-73',3581);

INSERT INTO `registro_venda`(`data`, `funcionario_cpf`, `aluno_ra`)
 VALUES ('2018-07-06','391.462.588-09',7922);

INSERT INTO `registro_venda`(`data`, `funcionario_cpf`, `aluno_ra`)
 VALUES ('2018-07-07','260.417.338-73',1777);

INSERT INTO `registro_venda`(`data`, `funcionario_cpf`, `aluno_ra`)
 VALUES ('2018-07-08','224.468.778-34',2661);

INSERT INTO `registro_venda`(`data`, `funcionario_cpf`, `aluno_ra`)
 VALUES ('2018-07-09','587.234.728-63',8624);

-- ITENS_VENDA
INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (2,1,1);

INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (1,1,3);

INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (1,1,7);


INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (1,2,8);

INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (1,2,2);

INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (3,2,5);


INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (3,3,7);


INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (2,4,4);


INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (1,5,6);

INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (1,5,7);


INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (1,6,2);

INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (1,6,3);

INSERT INTO `itens_venda`(`quantidade`, `registro_venda_id_registro`, `produto_id_produto`)
 VALUES (1,6,5);