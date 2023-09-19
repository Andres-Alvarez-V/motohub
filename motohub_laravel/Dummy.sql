INSERT INTO
    brands (id, name, country_origin, foundation_year, logo_image, description)
VALUES
    (1, 'Yamaha', 'Japan', 1955, 'yamaha.jpg', 'Yamaha Motor Co., Ltd. is a Japanese mobility manufacturer that produces motorcycles, motorboats, outboard motors, and other motorized products.'),
    (2, 'Honda', 'Japan', 1948, 'honda.jpg', 'Honda Motor Co., Ltd. is a Japanese public multinational conglomerate manufacturer of automobiles, motorcycles, and power equipment, headquartered in Minato, Tokyo, Japan.'),
    (3, 'Suzuki', 'Japan', 1803, 'suzuki.jpg', 'The description'),
    (4, 'Kawasaki', 'Japan', 1804, 'kawasaki.jpg', 'The description'),
    (5, 'Ducati', 'Italy', 1926, 'ducati.jpg', 'Founded in 1926, since 1946 Ducati has been manufacturing sport-inspired motorcycles characterised by high-performance engines, innovative design and cutting-edge technology');

INSERT INTO
    states (id,name)
VALUES
    (1, 'AMAZONAS'),
    (2, 'ANTIOQUIA'),
    (3, 'ARAUCA'),
    (4, 'ATLANTICO'),
    (5, 'BOLIVAR'),
    (6, 'BOYACA'),
    (7, 'CALDAS'),
    (8, 'CAQUETA'),
    (0, 'CASANARE'),
    (10, 'CAUCA'),
    (11, 'CESAR'),
    (12, 'CHOCO'),
    (13, 'CORDOBA'),
    (14, 'CUNDINAMARCA'),
    (15, 'GUAINIA'),
    (16, 'GUAVIARE'),
    (17, 'HUILA'),
    (18, 'LA GUAJIRA'),
    (19, 'MAGDALENA'),
    (20, 'META'),
    (21, 'NARINO'),
    (22, 'NORTE DE SANTANDER'),
    (23, 'PUTUMAYO'),
    (24, 'QUINDIO'),
    (25, 'RISARALDA'),
    (26, 'SAN ANDRES Y PROVIDENCIA'),
    (27, 'SANTANDER'),
    (28, 'SUCRE'),
    (29, 'TOLIMA'),
    (30, 'VALLE DEL CAUCA'),
    (31, 'VAUPES'),
    (32, 'VICHADA');

INSERT INTO
    motorcycles (id, name, model, category, image, description, price, stock, is_active, brand_id, state_id)
VALUES
    (1, 'Yamaha XTZ125', '2024', 'On-Off', 'yamaha_xtz125.jpg', 'The Yamaha XTZ 125 is a 2-seater Off Road that uses a Gasoline engine. The engine displacement is 124 and is available in 1 variants. Yamaha XTZ 125 uses a Manual gearbox, body length is 2090 mm, and ground clearance is 260 mm.', 10500000, 15, true, 1, 13),
    (2, 'Yamaha R1', '2023', 'Sport', 'yamaha_r1.jpg', 'The 2023 Yamaha R1 and R1M are powered by a 998cc, inline-four engine that produces 198 hp and 83 lb-ft of torque.', 99000000, 2, true, 1, 2),
    (3, 'Yamaha MT09', '2023', 'Sport', 'yamaha_mt09.jpg', 'The Yamaha MT-09 is a street motorcycle of the MT series with an 847–890 cc (51.7–54.3 cu in) liquid-cooled four-stroke 12-valve DOHC inline-three engine with crossplane crankshaft and a lightweight cast alloy frame.', 57500000, 5, true, 1, 14),
    (4, 'Suzuki DR650', '2020', 'Off-road', 'suzuki_dr650.jpg', 'Helping turn that horsepower into fun on this Japanese motorcycle is a five-speed transmission and an o-ring chain drive. The DR650S package is rounded out with height-adjustable front suspension, and a piggyback style rear link suspension which features adjustable height, preload, and compression settings.', 35000000, 3, true, 3, 25);
