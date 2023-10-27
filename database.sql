CREATE TABLE TB_PRODUTO(
	cd_produto INT NOT NULL AUTO_INCREMENT,
	nm_produto VARCHAR(100),
	vl_produto DOUBLE(8,2),
	ds_produto VARCHAR(200),
	nm_image VARCHAR(40),
	CONSTRAINT pk_produto PRIMARY KEY (cd_produto)
);

CREATE TABLE TB_PROMOCAO(
	cd_promocao INT NOT NULL AUTO_INCREMENT,
	nm_promocao VARCHAR(20),
	dt_inicio_promocao DATE,
	dt_fim_promocao DATE,
	CONSTRAINT pk_promocao PRIMARY KEY (cd_promocao)
);

CREATE table TB_DESCONTO(
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

INSERT INTO tb_produto 
	(nm_produto, vl_produto, ds_produto, nm_image)
		VALUES(
		"Celular Samsung Galaxy A04s 64GB Dual SM-A047MZKSZTO",
		776.67, 
		"Smartphone samsung galaxy A04S 6.5 octa-core 64GB 4GB câmera tripla Grandes tecnologia, na palma da sua mão com funções simples para o seu dia a dia. A Samsung traz para você o Galaxy A04s.",
		"celular.png"
		),
		(
		"Smart TV LED 32' HD Philco PTV32G70RCH Roku TV com Dolby Audio Midia e Processador Quad-core",
		898.99, 
		"Televisor Smart Roku Philco com acesso à todos os aplicativos disponíveis no sistema Roku. Tela de 32 polegadas em resolução HD.",
		"tv2.png"
		),
		(
		"Ar Condicionado Split LG Voice 15000 BTUs Frio Dual Inverter 220V - S4-Q15JL31A",
		2699.00, 
		"Ar Condicionado Split LG Voice 15000 BTUs Frio Dual Inverter 220V S4-Q15JL31A O Ar Condicionado Split LG Voice '15000' BTUs Frio 'Dual Inverter' é perfeito para quem procura alta tecnologia.",
		"arcondicionado.png"
		);

INSERT INTO TB_PROMOCAO (nm_promocao, dt_inicio_promocao, dt_fim_promocao)
	VALUES ("Promoção Especial", "2023-10-21", "2024-10-21") ;

INSERT INTO tb_desconto (pc_desconto, cd_produto, cd_promocao)
	VALUES (10, 1, 1)
   