��������������������������������������������
���@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@��
���@�@�`�����N2�~�܂˂����́@�@�@�@�@�@�@ ��
���@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@��
��������������������������������������������

�f�����Ƀ����N�𓊍e����PHP�X�N���v�g�ł��B
�����̓X�N���v�g���v��������Q�l�ɂ��Ă��܂��B

�`�����N�Q�̕��́AMySQL���g���ăf�[�^���Ǘ����Ă��܂��B
�f�[�^�x�[�X�́uEUC-JP�v�ŊǗ�����Ă���ƒ�`���܂��B�e�X�̃t�@�C����EUC-JP�ŕۑ����Ă��܂��B


link.php     -- ���C���B���e�ƋL���ꗗ�\���B
makelinkdata.php -- ���e���ꂽ�����N�f�[�^�𐮌`���AMySQL�Ńf�[�^�x�[�X�Ɋi�[���܂��B
getlinkdata.php  -- �f�[�^�x�[�X���烌�R�[�h������āA���e�L���Ƃ��Đ��`���܂��B
deletelinkdata.php -- �I�����ꂽ�L�����폜���܂��B
viewlog.php     -- ���O�ǂ݁Blink.php�̓��e��ʂȂ��łƌ����܂��B0�`1000���܂ł���C�ɕ\�����܂��B

profile.php    -- �K�v�ȕϐ��B�w�b�_�t�@�C���ɑ�������B

quicklink.php     -- �N�C�b�N�����N�ݒ�BCSV�t�@�C�����g���������N��ʁB
getlinkurl.php    -- �N�C�b�N�����N��getlink�BCSV�t�@�C��������B
quicklink.csv    -- �N�C�b�N�����N��CSV�t�@�C���œ����Ă���B�u�^�C�g��, URL�v�̂݁B

i.php
makelinkdata_i.php
viewlog_i.php


����������������
���@��{���@��
����������������

�E��ʑJ��

link.php ��(���e)�� makelinkdata.php
�@�@�@�@ ��(���O�ǂ�)�� viewlog.php
         ��(�N�C�b�N�����N�ݒ�)�� quicklink.php

����������������������
���@�t�@�C���̏ڍׁ@��
����������������������
�Elink.php
���C����ʁB
���ꎩ�̂́A@getlinkdata(0,30,$db_server)���Ăяo���Ă��邾���ł��B30���\�������Ă��܂��B
���e������makelinkdata.php�ւƔ�т܂��B

�Egetlinkdata.php
�f�[�^�x�[�X���烌�R�[�h������āA���e�L���Ƃ��Đ��`���܂��B

�f�[�^�x�[�X�̃t�B�[���h�ɂ́A
title            �^�C�g��
url                URL�A�h���X
message        �{��
up_date        ���e����
up_time        ���e����
date_time    ���`���ꂽ���e����
flag             ���t�@���[�����邩�̃t���O
hidden		���e�L����\�������Ȃ�
�������Ă��܂��B


@getlinkdata( �ŏ��̋L���ԍ��C�Ō�̋L���ԍ��C�f�[�^�x�[�X�T�[�o�[, �G���R�[�h�^�C�v)

�G���R�[�h�^�C�v�̃f�t�H���g��EUC-JP�ł��B


����������������������
���@�C���X�g�[���@�@��
����������������������

�C���X�g�[���̕��@�ł��B

profile.php�Ƀf�[�^�x�[�X�̏ꏊ�A���[�U�[�A�p�X���[�h�ADB���A�e�[�u�������L�q���Ă��������B

���YDB�Ɏ��̂悤�ȃe�[�u�����쐬���Ă��������B
�t�B�[���h��|	���	|	NULL�l|	���̑�
id		int(11)			auto_increment
title		varchar(255)
url		varchar(255)	NULL��
message		text		NULL��
up_date		date
up_time		time
date_time	varchar(255)
flag		int(11)
hidden		int(11)
	

����������������
���@�X�V�����@��
����������������
v2.6
���폜�@�\�̒ǉ�
deletelinkdata.php��ǉ����A�L���̍폜���s����悤�ɂ��܂����B
���ۂɂ�hidden��1�ɂ��Ahidden=1�̏ꍇ�̓f�[�^���o���Ȃ��悤��getlinkdata.php�����������܂����B
v2.5
�N�C�b�N�����N�ݒ�̒ǉ�
�N�C�b�N�����N�ݒ�̕ύX���s����悤�ɂ��܂����B
����ɔ����A�t�@�C������
���Fchlinkurl.php �� �V�Fquicklink.php
�֕ύX���܂����BCSV�f�[�^�ɕҏW�ł���悤�ɂ��܂����B
�������݃��[�h�Ɠǂݍ��݃��[�h���d�����Ė��ʂɂȂ��Ă�悤�ȋC�����邩�炻���͒������������������B
v2.4
���e�L����ԍ��Ƃ��Ď��ʂ���<A name="1021"></A>�̐������o�Ă��Ȃ����������������܂����B
HTML�\�[�X�����s����Ă��Ȃ��ׂɌ��Â炢�̂��������܂����B
utf-8�̃f�[�^�x�[�X�T�[�o���g���ׂɁAgetlinkdata, makelinkdata��
�@//	@mysql_query("SET NAMES utf8")
�Ƃ����R�}���h��ǉ����܂����Butf8�̏ꍇ�ɂ͂����L���ɂ��Ă��������B
�����G���R�[�h�^�C�v�̕ϊ����b��I�ɂ�߂܂����Butf8�Ƃ������݂������Ȃ��Ă��Ă���̂ŁB





������������������������������
���@�v���O�����Ɋւ��鎖���@��
������������������������������

�ESJIS�ɂ��āB
getlinkdata.php�������āA
link.php �� i.php
viewlog.php �� viewlog_i.php
makelinkdata.php �� makelinkdata_i.php
�Ƃ킴�킴�ʃt�@�C���ŗp�ӂ��Ă��܂��B�����HTML�\�[�X���������Ă邽�߁AEUC��SJIS�ňقȂ�ۑ������Ȃ��Ƃ����Ȃ��A�Ƃ�����肪�������Ă邩��ł��BHTML��PHP�œf���o���āAEUC��SJIS�I������Γ���ł��邩���ł��B
