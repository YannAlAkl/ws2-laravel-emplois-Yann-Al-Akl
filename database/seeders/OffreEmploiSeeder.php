<?php

namespace Database\Seeders;

use App\Models\OffreEmploi;
use Illuminate\Database\Seeder;

class OffreEmploiSeeder extends Seeder
{
    public function run(): void
    {
        $offres = [
            [
                'titre'            => 'Développeur web full-stack',
                'entreprise'       => 'Groupe Solaris',
                'ville'            => 'Montréal',
                'type_emploi'      => 'Temps plein',
                'salaire'          => '65 000 $ - 80 000 $',
                'description'      => "Rejoignez l'équipe applicative interne pour concevoir et maintenir nos outils web. Vous travaillerez sur des projets variés au sein d'une petite équipe agile.",
                'responsabilites'  => "Développer de nouvelles fonctionnalités web.\nCorriger les anomalies et améliorer les performances.\nParticiper aux revues de code et aux choix techniques.",
                'exigences'        => "2 ans d'expérience en développement web.\nMaîtrise de PHP, JavaScript et d'un framework moderne.\nConnaissance des bases de données relationnelles.",
                'est_active'       => true,
                'date_publication' => '2026-06-01',
            ],
            [
                'titre'            => 'Analyste de bases de données',
                'entreprise'       => 'Groupe Solaris',
                'ville'            => 'Québec',
                'type_emploi'      => 'Temps plein',
                'salaire'          => '70 000 $',
                'description'      => "Vous serez responsable de la modélisation, de l'optimisation et de la fiabilité de nos bases de données internes.",
                'responsabilites'  => "Concevoir et maintenir les schémas de données.\nOptimiser les requêtes lentes.\nMettre en place les sauvegardes et la surveillance.",
                'exigences'        => "Excellente maîtrise du SQL.\nExpérience avec SQLite, MySQL ou PostgreSQL.\nRigueur et souci du détail.",
                'est_active'       => true,
                'date_publication' => '2026-06-03',
            ],
            [
                'titre'            => 'Designer UI/UX',
                'entreprise'       => 'Groupe Solaris',
                'ville'            => 'Montréal',
                'type_emploi'      => 'Contractuel',
                'salaire'          => '60 000 $',
                'description'      => "Vous concevrez des interfaces claires et cohérentes pour nos applications internes, du croquis au prototype.",
                'responsabilites'  => "Créer des maquettes et des prototypes interactifs.\nDéfinir et maintenir un système de design.\nCollaborer étroitement avec les développeurs.",
                'exigences'        => "Portfolio démontrant des projets d'interface.\nMaîtrise de Figma.\nSens de l'accessibilité et de la cohérence visuelle.",
                'est_active'       => true,
                'date_publication' => '2026-06-05',
            ],
            [
                'titre'            => 'Technicien en support informatique',
                'entreprise'       => 'Groupe Solaris',
                'ville'            => 'Laval',
                'type_emploi'      => 'Temps plein',
                'salaire'          => '48 000 $',
                'description'      => "Premier point de contact des employés, vous assurez le bon fonctionnement du parc informatique et la résolution des incidents.",
                'responsabilites'  => "Répondre aux demandes de support des employés.\nInstaller et configurer le matériel et les logiciels.\nDocumenter les incidents et leurs solutions.",
                'exigences'        => "DEC en informatique ou expérience équivalente.\nBon sens du service et de la communication.\nConnaissance de Windows et des outils bureautiques.",
                'est_active'       => true,
                'date_publication' => '2026-06-07',
            ],
            [
                'titre'            => 'Chargé de projet TI',
                'entreprise'       => 'Groupe Solaris',
                'ville'            => 'Montréal',
                'type_emploi'      => 'Temps plein',
                'salaire'          => '85 000 $',
                'description'      => "Vous coordonnerez les projets technologiques internes, de la planification à la livraison, en assurant le respect des échéances et des budgets.",
                'responsabilites'  => "Planifier et suivre l'avancement des projets.\nCoordonner les équipes et les parties prenantes.\nGérer les risques et les budgets.",
                'exigences'        => "Expérience en gestion de projet TI.\nConnaissance des méthodes agiles.\nExcellentes aptitudes de communication.",
                'est_active'       => true,
                'date_publication' => '2026-06-09',
            ],
            [
                'titre'            => 'Stagiaire en développement logiciel',
                'entreprise'       => 'Groupe Solaris',
                'ville'            => 'Télétravail',
                'type_emploi'      => 'Stage',
                'salaire'          => '22 $ / heure',
                'description'      => "Stage encadré au sein de l'équipe de développement, idéal pour mettre en pratique vos compétences sur des projets réels.",
                'responsabilites'  => "Contribuer au développement de fonctionnalités.\nÉcrire des tests simples.\nParticiper aux réunions d'équipe.",
                'exigences'        => "Étudiant en informatique.\nBases en programmation web.\nMotivation et curiosité.",
                'est_active'       => true,
                'date_publication' => '2026-06-11',
            ],
            [
                'titre'            => 'Administrateur système',
                'entreprise'       => 'Groupe Solaris',
                'ville'            => 'Québec',
                'type_emploi'      => 'Temps plein',
                'salaire'          => '78 000 $',
                'description'      => "Poste pourvu récemment, conservé pour illustrer une offre désactivée dans l'interface d'administration.",
                'responsabilites'  => "Administrer les serveurs et les réseaux.\nAssurer la sécurité et les mises à jour.\nGérer les accès et les sauvegardes.",
                'exigences'        => "Expérience en administration de systèmes Linux.\nNotions de sécurité réseau.\nAutonomie et sens des responsabilités.",
                'est_active'       => false,
                'date_publication' => '2026-05-20',
            ],
        ];

        foreach ($offres as $offre) {
            OffreEmploi::create($offre);
        }
    }
}
