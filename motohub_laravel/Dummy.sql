INSERT INTO
    brands (id, name, country_origin, foundation_year, logo_image, description)
VALUES
    (1, 'Yamaha', 'Japan', 1955, 'yamaha.jpg', 'Yamaha Motor Co., Ltd. is a Japanese mobility manufacturer that produces motorcycles, motorboats, outboard motors, and other motorized products.'),
    (2, 'Honda', 'Japan', 1948, 'honda.jpg', 'Honda Motor Co., Ltd. is a Japanese public multinational conglomerate manufacturer of automobiles, motorcycles, and power equipment, headquartered in Minato, Tokyo, Japan.'),
    (3, 'Suzuki', 'Japan', 1803, 'suzuki.jpg', 'The description'),
    (4, 'Kawasaki', 'Japan', 1804, 'kawasaki.jpg', 'The description'),
    (5, 'Ducati', 'Italy', 1926, 'ducati.jpg', 'Founded in 1926, since 1946 Ducati has been manufacturing sport-inspired motorcycles characterised by high-performance engines, innovative design and cutting-edge technology');

INSERT INTO
    motorcycles (id, name, model, category, image, description, price, stock, state, brand_id)
VALUES
    (1, 'Yamaha xtz125', '2024', 'On-Off', 'yamaha_xtz125.jpg', 'The Yamaha XTZ 125 is a 2-seater Off Road that uses a Gasoline engine. The engine displacement is 124 and is available in 1 variants. Yamaha XTZ 125 uses a Manual gearbox, body length is 2090 mm, and ground clearance is 260 mm.', 10500000, 15, 'Córdoba', 1),
    (2, 'Yamaha R1', '2023', 'Sport', 'yamaha_r1.jpg', 'The 2023 Yamaha R1 and R1M are powered by a 998cc, inline-four engine that produces 198 hp and 83 lb-ft of torque.', 99000000, 2, 'Antioquia', 1);
