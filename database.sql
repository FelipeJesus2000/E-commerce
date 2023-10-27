CREATE TABLE IF NOT EXISTS TB_CATEGORIA(
	cd_categoria INT NOT NULL AUTO_INCREMENT,
	nm_categoria VARCHAR(20),
	nm_icone_categoria VARCHAR(20),
	CONSTRAINT pk_categoria PRIMARY KEY (cd_categoria)
);

CREATE TABLE IF NOT EXISTS TB_PRODUTO(
	cd_produto INT NOT NULL AUTO_INCREMENT,
	nm_produto VARCHAR(100),
	vl_produto DOUBLE(8,2),
	ds_produto VARCHAR(200),
	nm_imagem_produto VARCHAR(40),
	cd_categoria INT,
	CONSTRAINT pk_produto PRIMARY KEY (cd_produto),
	CONSTRAINT fk_categoria 
		FOREIGN KEY(cd_categoria)
			REFERENCES TB_CATEGORIA(cd_categoria)
);

CREATE TABLE IF NOT EXISTS TB_PROMOCAO(
	cd_promocao INT NOT NULL AUTO_INCREMENT,
	nm_promocao VARCHAR(20),
	dt_inicio_promocao DATE,
	dt_fim_promocao DATE,
	CONSTRAINT pk_promocao PRIMARY KEY (cd_promocao)
);

CREATE TABLE IF NOT EXISTS TB_DESCONTO(
	pc_desconto INT(2),
	cd_produto INT NOT NULL,
	cd_promocao INT NOT NULL,
	CONSTRAINT fk_produto_promocao 
		FOREIGN KEY(cd_produto)
			REFERENCES TB_PRODUTO (cd_produto),
	CONSTRAINT fk_promocao_produto
		FOREIGN KEY(cd_promocao)
			REFERENCES TB_PROMOCAO (cd_promocao),
				CONSTRAINT pk_desconto_produto PRIMARY KEY(cd_produto, cd_promocao)
);

INSERT INTO tb_categoria (cd_categoria, nm_categoria) VALUES
(1, 'celular', 'celular.png'),
(2, 'televisão', 'televisão.png'),
(3, 'eletrodoméstico', 'eletrodoméstico.png'),
(4, 'notebook', 'notebook.png'),
(5, 'relógio', 'relógio.png'),
(6, 'livro', 'livro.png'),
(7, 'móvel', 'móvel.png');




INSERT INTO tb_produto 
	(nm_produto, vl_produto, ds_produto, nm_imagem_produto, cd_categoria)
		VALUES(
		"Celular Samsung Galaxy A04s 64GB Dual SM-A047MZKSZTO",
		776.67, 
		"Smartphone samsung galaxy A04S 6.5 octa-core 64GB 4GB câmera tripla Grandes tecnologia, na palma da sua mão com funções simples para o seu dia a dia. A Samsung traz para você o Galaxy A04s.",
		"celular.png",
		1
		),
		(
		"Smart TV LED 32' HD Philco PTV32G70RCH Roku TV com Dolby Audio Midia e Processador Quad-core",
		898.99, 
		"Televisor Smart Roku Philco com acesso à todos os aplicativos disponíveis no sistema Roku. Tela de 32 polegadas em resolução HD.",
		"tv2.png",
		2
		),
		(
		"Ar Condicionado Split LG Voice 15000 BTUs Frio Dual Inverter 220V - S4-Q15JL31A",
		2699.00, 
		"Ar Condicionado Split LG Voice 15000 BTUs Frio Dual Inverter 220V S4-Q15JL31A O Ar Condicionado Split LG Voice '15000' BTUs Frio 'Dual Inverter' é perfeito para quem procura alta tecnologia.",
		"arcondicionado.png",
		3
		);

INSERT INTO TB_PROMOCAO (nm_promocao, dt_inicio_promocao, dt_fim_promocao)
	VALUES ("Promoção Especial", "2023-10-21", "2024-10-21") ;

INSERT INTO tb_desconto (pc_desconto, cd_produto, cd_promocao)
	VALUES (10, 1, 1)

INSERT INTO tb_desconto (pc_desconto, cd_produto, cd_promocao)
	VALUES (10, 1, 1)
   
