/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     02/05/2019 01:56:15                          */
/*==============================================================*/


drop table if exists APPARTENIR;

drop table if exists COMPTE;

drop table if exists GROUPE;

drop table if exists MESSAGE;

drop table if exists PIECE_JOINTE;

/*==============================================================*/
/* Table: APPARTENIR                                            */
/*==============================================================*/
create table APPARTENIR
(
   ID_COMPTE            int not null,
   ID_GROUPE            int not null,
   primary key (ID_COMPTE, ID_GROUPE)
);

/*==============================================================*/
/* Table: COMPTE                                                */
/*==============================================================*/
create table COMPTE
(
   ID_COMPTE            int(5) not null auto_increment,
   LOGIN                text,
   PASSWORD             text,
   PROFILE_PICTURE      longblob,
   NOM                  text,
   PRENOM               text,
   BIRTH_DATE           date,
   INSCRIPTION          datetime,
   STATUS               tinyint,
   EMAIL                text,
   primary key (ID_COMPTE)
);

/*==============================================================*/
/* Table: GROUPE                                                */
/*==============================================================*/
create table GROUPE
(
   ID_GROUPE            int(9) not null auto_increment,
   TITRE                text,
   primary key (ID_GROUPE)
);

/*==============================================================*/
/* Table: MESSAGE                                               */
/*==============================================================*/
create table MESSAGE
(
   ID_MESSAGE           int(9) not null auto_increment,
   ID_COMPTE            int not null,
   ID_COMPTE_REC        int,
   ID_GROUPE            int,
   LIBELLE              text,
   TIME                 datetime,
   primary key (ID_MESSAGE)
);

/*==============================================================*/
/* Table: PIECE_JOINTE                                          */
/*==============================================================*/
create table PIECE_JOINTE
(
   ID_PIECE             int(9) not null auto_increment,
   ID_MESSAGE           int not null,
   TYPE                 char(3),
   FILE                 longblob,
   primary key (ID_PIECE)
);

alter table APPARTENIR add constraint FK_APPARTENIR foreign key (ID_GROUPE)
      references GROUPE (ID_GROUPE) on delete restrict on update restrict;

alter table APPARTENIR add constraint FK_APPARTENIR2 foreign key (ID_COMPTE)
      references COMPTE (ID_COMPTE) on delete restrict on update restrict;

alter table MESSAGE add constraint FK_EMETTEUR foreign key (ID_COMPTE)
      references COMPTE (ID_COMPTE) on delete restrict on update restrict;

alter table MESSAGE add constraint FK_RECEPTEUR_C foreign key (ID_COMPTE_REC)
      references COMPTE (ID_COMPTE) on delete restrict on update restrict;

alter table MESSAGE add constraint FK_RECEPTEUR_G foreign key (ID_GROUPE)
      references GROUPE (ID_GROUPE) on delete restrict on update restrict;

alter table PIECE_JOINTE add constraint FK_CONTENIR foreign key (ID_MESSAGE)
      references MESSAGE (ID_MESSAGE) on delete restrict on update restrict;

