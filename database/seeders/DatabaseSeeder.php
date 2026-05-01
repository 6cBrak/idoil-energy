<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Project;
use App\Models\Catalogue;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Services réels IDOIL ENERGY
        $services = [
            [
                'titre'            => 'Fourniture d\'Hydrocarbure',
                'description'      => 'Approvisionnement en carburants de qualité (essence, gasoil, fuel) pour particuliers, entreprises et industries.',
                'description_longue' => 'IDOIL ENERGY assure l\'approvisionnement régulier et fiable en hydrocarbures pour tous types de besoins. Qu\'il s\'agisse de ravitaillement de flotte d\'entreprise, d\'alimentation industrielle ou de fourniture en station-service, nous garantissons des produits conformes aux normes en vigueur, livrés dans les délais et aux meilleurs prix du marché burkinabè.',
                'icone'            => 'gas-pump',
                'ordre'            => 1,
            ],
            [
                'titre'            => 'Gaz & Lubrifiants',
                'description'      => 'Distribution de gaz butane, propane et lubrifiants industriels pour particuliers et professionnels.',
                'description_longue' => 'Notre activité Gaz & Lubrifiants couvre la distribution de gaz butane en bouteilles et en vrac, le propane pour usage domestique et industriel, ainsi qu\'une gamme étendue de lubrifiants moteur, hydrauliques et industriels. Nous proposons des formules d\'abonnement et de livraison périodique adaptées à vos volumes de consommation.',
                'icone'            => 'fire-flame-curved',
                'ordre'            => 2,
            ],
            [
                'titre'            => 'Fourniture d\'Énergie Solaire',
                'description'      => 'Installation de systèmes solaires photovoltaïques on-grid et off-grid pour tout type de client.',
                'description_longue' => 'Avec l\'ambition de rendre l\'énergie accessible partout en Afrique, IDOIL ENERGY propose des solutions solaires clé en main : étude technique, fourniture et installation de panneaux photovoltaïques, systèmes de stockage par batteries et onduleurs. Nos installations couvrent les besoins résidentiels, commerciaux, agricoles et industriels.',
                'icone'            => 'sun',
                'ordre'            => 3,
            ],
            [
                'titre'            => 'Logistique Énergétique',
                'description'      => 'Transport et livraison sécurisée de carburants et produits énergétiques partout au Burkina Faso.',
                'description_longue' => 'Disposant d\'une flotte de camions-citernes modernes et homologués, IDOIL ENERGY assure le transport et la livraison de produits énergétiques sur l\'ensemble du territoire burkinabè. Nous intervenons également dans les pays limitrophes. Chaque livraison est planifiée avec rigueur dans le respect des normes de sécurité applicables au transport de matières dangereuses.',
                'icone'            => 'truck',
                'ordre'            => 4,
            ],
            [
                'titre'            => 'Borne de Recharge Électrique',
                'description'      => 'Déploiement et gestion de bornes de recharge pour véhicules électriques en Afrique de l\'Ouest.',
                'description_longue' => 'IDOIL ENERGY est pionnière dans le déploiement de l\'infrastructure de mobilité électrique au Burkina Faso. Nous installons et maintenons des bornes de recharge AC et DC pour particuliers, entreprises, parkings et stations-service. Nos solutions intègrent des systèmes de supervision à distance et des modes de paiement adaptés au contexte africain.',
                'icone'            => 'bolt',
                'ordre'            => 5,
            ],
            [
                'titre'            => 'Conseils & Formation',
                'description'      => 'Audit énergétique, conseil en stratégie et formation des professionnels du secteur de l\'énergie.',
                'description_longue' => 'Notre pôle conseil accompagne les entreprises et institutions dans leurs choix énergétiques : audit de consommation, étude de faisabilité, dimensionnement d\'installations et optimisation des coûts. IDOIL ENERGY organise également des sessions de formation pratique à destination des techniciens, gérants de station-service et professionnels de l\'énergie.',
                'icone'            => 'graduation-cap',
                'ordre'            => 6,
            ],
        ];

        foreach ($services as $s) {
            Service::create($s);
        }

        // 3 Projets - Création de stations-service au Burkina Faso
        $projets = [
            [
                'titre'       => 'Station-Service Dori – Région du Sahel',
                'client'      => 'Investisseur privé',
                'localisation'=> 'Dori, Burkina Faso',
                'annee'       => 2024,
                'description' => 'Construction et équipement complet d\'une station-service moderne à Dori, dans la région du Sahel. Le projet comprend le génie civil, l\'installation de cuves enterrées d\'une capacité de 45 000 litres, des distributeurs multicarburants, une verrière, un point de vente de gaz butane et une mini-boutique. La station dessert une zone stratégique à fort potentiel de croissance.',
                'categorie'   => 'Pétrole & Gaz',
                'statut'      => 'Réalisé',
                'en_vedette'  => true,
                'ordre'       => 1,
            ],
            [
                'titre'       => 'Station-Service Ouagadougou – Zone Industrielle',
                'client'      => 'Groupe privé burkinabè',
                'localisation'=> 'Ouagadougou, Burkina Faso',
                'annee'       => 2025,
                'description' => 'Réalisation d\'une station-service multi-services dans la zone industrielle de Ouagadougou. Les travaux incluent une étude de sol, la construction du génie civil, l\'installation de 4 cuves enterrées totalisant 80 000 litres, 6 pistes de ravitaillement, une canopée de 1 000 m², une boutique, une laverie automobile et une borne de recharge électrique intégrée.',
                'categorie'   => 'Pétrole & Gaz',
                'statut'      => 'Réalisé',
                'en_vedette'  => true,
                'ordre'       => 2,
            ],
            [
                'titre'       => 'Station-Service Bobo-Dioulasso – Axe Ghana',
                'client'      => 'Investisseur privé',
                'localisation'=> 'Bobo-Dioulasso, Burkina Faso',
                'annee'       => 2025,
                'description' => 'Construction d\'une station-service moderne sur l\'axe Bobo-Dioulasso – Frontière Ghana. Le projet comprend 3 cuves enterrées de 30 000 litres chacune, 4 distributeurs multicarburants, une canopée de 800 m², un local commercial, un espace gaz et une installation solaire photovoltaïque pour l\'autonomie énergétique partielle de la station.',
                'categorie'   => 'Énergie Renouvelable',
                'statut'      => 'En cours',
                'en_vedette'  => true,
                'ordre'       => 3,
            ],
        ];

        foreach ($projets as $p) {
            Project::create($p);
        }

        // Catalogue produits et équipements
        $catalogueItems = [
            ['Gasoil B7 (Gas-oil)', 'Gasoil conforme à la norme B7, adapté à tous moteurs diesel. Livraison en citerne ou en fût. Qualité certifiée et traçabilité garantie.', 'Carburants & Hydrocarbures', 'IDO-CH-001', 1],
            ['Essence Sans Plomb SP95', 'Essence sans plomb indice 95, pour véhicules à moteur à essence. Disponible en livraison directe ou en station. Qualité aux normes en vigueur.', 'Carburants & Hydrocarbures', 'IDO-CH-002', 2],
            ['Gaz Butane 12 kg', 'Bouteille de gaz butane 12 kg pour usage domestique et commercial. Distribution individuelle ou par palette. Disponible sur l\'ensemble du territoire.', 'Gaz & Lubrifiants', 'IDO-GL-001', 3],
            ['Lubrifiant Moteur 15W40 – 20L', 'Lubrifiant moteur minéral polyvalent 15W40. Convient aux moteurs diesel et essence. Bidons de 20 litres. Homologué constructeurs API CI-4 / SL.', 'Gaz & Lubrifiants', 'IDO-GL-002', 4],
            ['Kit Solaire Off-Grid 1 kWc', 'Kit solaire complet : 3 panneaux 340W, onduleur hybride 1 kVA, batterie 200Ah, régulateur MPPT et câblage. Installation incluse sur demande. Idéal maison ou boutique.', 'Énergie Solaire', 'IDO-ES-001', 5],
            ['Panneau Solaire Monocristallin 400Wc', 'Panneau solaire monocristallin haute efficacité, 400Wc. Rendement ≥ 20,5%. Garantie 25 ans sur la puissance. Compatible tous types d\'onduleurs.', 'Énergie Solaire', 'IDO-ES-002', 6],
            ['Borne de Recharge AC 22 kW', 'Borne de recharge véhicule électrique AC triphasé 22 kW. Connecteurs Type 2. Supervision à distance via application mobile. Installation et maintenance assurées par IDOIL ENERGY.', 'Bornes de Recharge', 'IDO-BR-001', 7],
            ['Cuve Enterrée Fibre de Verre 30 000 L', 'Cuve de stockage carburant enterrée en fibre de verre, capacité 30 000 litres. Double paroi avec détection de fuite intégrée. Norme EN 13160. Idéale pour station-service.', 'Équipements de Station', 'IDO-ST-001', 8],
            ['Distributeur Carburant 4 Pistes', 'Distributeur carburant électronique 4 pistes (2 produits × 2 côtés). Débitmètre haute précision, afficheur LCD, imprimante de tickets. Homologation métrologique.', 'Équipements de Station', 'IDO-ST-002', 9],
            ['Kit EPI Secteur Pétrolier', 'Kit complet d\'équipements de protection individuelle pour professionnels du secteur énergétique : casque, lunettes, gants antistatiques, chaussures de sécurité, combinaison ignifugée.', 'Équipements HSE', 'IDO-HSE-001', 10],
        ];

        foreach ($catalogueItems as [$titre, $desc, $cat, $ref, $ordre]) {
            Catalogue::create(['titre' => $titre, 'description' => $desc, 'categorie' => $cat, 'reference' => $ref, 'ordre' => $ordre, 'telecharger' => true]);
        }

        // Équipe dirigeante (contexte Burkina Faso)
        $team = [
            ['Directeur Général', 'PDG fondateur, entrepreneur engagé dans le développement du secteur énergétique en Afrique de l\'Ouest.', 1],
            ['Directrice Technique', 'Ingénieure spécialisée en systèmes énergétiques, experte en installation et maintenance d\'équipements.', 2],
            ['Directeur Commercial', 'Spécialiste en développement des affaires et partenariats stratégiques dans le secteur de l\'énergie.', 3],
            ['Responsable HSE', 'Expert en sécurité industrielle et conformité réglementaire pour le secteur pétrolier et gazier.', 4],
        ];

        foreach ($team as [$poste, $bio, $ordre]) {
            TeamMember::create(['nom' => 'IDOIL ENERGY', 'poste' => $poste, 'bio' => $bio, 'ordre' => $ordre]);
        }
    }
}
