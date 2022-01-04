# Hospital factory

Le but de la plateforme est de pouvoir suivre les hôpitaux, docteurs et patients.

### Indications :

- un hôpital a un nom, une adresse et possède des locaux.

- un local a un nom (ex: local502) et peut avoir un type. (ex: bureau ou bloc)

- les docteurs ont un nom, des années d'expériences et une spécialisation. Chaque docteur peut avoir des consultations.

- une consultation est un rendez-vous entre un patient et un docteur pour une date et heure données. Il peut être planifié (futur), annulé (futur ou passé), raté (passé) ou fait (passé ou présent).

- les patients ont un nom, prénom, date de naissance, numéro de registre, genre, adresse, pays, ville, code postal, numéro de GSM, personne de contact, numéro de personne de contact.

- les patients ont un dossier médical. Ce dossier médical est un registre des résultats d'une consultation, après une consultation, le médecin crée une data si une nouvelle maladie est diagnostiquée. Sinon il peut aussi soigner le patient ou le mettre en cours de traitement.

- Un dossier médical répertorie un patient, une maladie (présente dans notre base de données) et la consultation qui a donné ce diagnostic. Il comporte aussi un statut qui peut être "diagnostiqué", "en cours de traitement", "guéri", ou "incurable".

- notre base de données de maladie doit comporter son nom, si elle est curable ou non et son traitement si elle est curable.


⚠️ **Information importante : le type de local, statut d'une consultation et statut du dossier médical sont des tables séparées.** ⚠️

### À FAIRE
1) Schématiser la base de données
2) Créer le projet Laravel et la base de données
3) Créer des seeds pour peupler notre base de données comme indiqué
    - Seed 3 hôpitaux
    - Factory de 50 docteurs
    - Factory de 200 patients
    - Seed de 30 maladies que vous devez chercher en ligne (dont 10 incurable)
    - Factory de 150 locaux (au hasard dans les hôpitaux, mais un hôpital ne peut pas avoir plus de 80 locaux)
    - Factory de 2000 Consultations au hasard entre 01/06/2021 au 31/01/2022 et heures entre 8h et 19h. Un statut doit lui être attribué avec une chance de 3 sur 4 d'être "Fait" si la date est passée. Si une consultation a un statut "Fait" un dossier médical doit être créé pour le patient.
    - Le dossier médical doit prendre une maladie et un statut au hasard. Attention au cas des maladies incurables. Pas plus de 5 dossiers médicaux pour un client donné.

⚠️ **Attention, un médecin ne peut pas avoir une consultation au même moment avec 2 patients et un patient ne peut pas avoir plus d'une consultation par jour** ⚠️

4) Afficher les données dans un format de simple tableau
    - Avoir une page où l'on peut voir les 3 hôpitaux
    - Page hôpital avec consultation dans l'ordre (date, nom docteur, local, nom patient, statut consultation, maladie si diagnostiquée)
    - Page avec tous les patients
    - Page dossier médical d'un patient sélectionné.
