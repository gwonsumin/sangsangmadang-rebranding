# KT&G 상상마당 리브랜딩 웹사이트

PHP와 MySQL을 기반으로 제작한 KT&G 상상마당 리브랜딩 웹사이트입니다.  
공지사항 게시판(CRUD)을 직접 구현하고, 실제 서버에 배포까지 진행한 프로젝트입니다.

🔗 Live Site  
https://gsumin8327.dothome.co.kr/

---

## 📌 프로젝트 개요

- **프로젝트명**: KT&G 상상마당 리브랜딩
- **작업 기간**: (작성)
- **역할**: 기획 / UI 디자인 / 퍼블리싱 / PHP 개발 / 배포
- **목표**
  - 상상마당의 복합문화공간 특성을 반영한 UX/UI 재설계
  - PHP 기반 게시판 기능 직접 구현
  - 실제 서버 배포 경험 확보

---

## 🛠 기술 스택

- **Frontend**: HTML, CSS, JavaScript, jQuery
- **Backend**: PHP
- **Database**: MySQL
- **Deploy**: Dothome, FileZilla

---

## ✨ 주요 기능

- 메인 페이지 및 섹션 UI 구성
- 프로그램 / 공간 / 아카이브 페이지 구성
- 공지사항 게시판 구현 (CRUD)
  - 글 작성(Create)
  - 목록 조회(Read)
  - 상세 조회(Read)
  - 수정(Update)
  - 삭제(Delete)
- 메인 페이지 최신 공지 4개 자동 출력
- 이미지 업로드 및 출력 기능

---

## 🔧 주요 구현 내용

### 1. 게시판 CRUD 구현

- PHP와 MySQL을 활용하여 게시판 기능 직접 구현
- SQL 쿼리를 이용한 데이터 삽입 / 조회 / 수정 / 삭제 처리

### 2. DB 연동

- define.php를 통해 DB 연결 관리
- 게시글 데이터를 기반으로 동적 페이지 구성

### 3. 파일 업로드 기능

- 이미지 업로드 처리 및 서버 저장
- 게시글 본문에 이미지 출력

### 4. 메인 페이지 연동

- 공지사항 최신 데이터 4개를 DB에서 불러와 메인에 출력

---

## 📂 프로젝트 구조

```text
SangsangMadang/
├─ index.php
├─ header.php
├─ footer.php
├─ define.php
├─ board_list.php
├─ board_view.php
├─ board_form.php
├─ board_modify_form.php
├─ board_insert.php
├─ board_modify.php
├─ board_delete.php
├─ css/
├─ js/
├─ img/
├─ data/
├─ db/
├─ sub01/
│  ├─ style.css
│  └─ main.css
├─ sub01_01/
│  ├─ style.css
│  └─ main.css
└─ myPage/
   ├─ style.css
   └─ main.css
```

---

## 🚀 배포

- Dothome 서버를 이용한 웹사이트 배포
- FileZilla를 통한 파일 업로드 및 관리

---

## 🔐 테스트 계정

- **ID**: `admin`
- **PW**: `1234`

---

## 💡 배운 점

- PHP와 MySQL을 활용한 서버 사이드 개발 흐름 이해
- CRUD 구조를 직접 구현하며 데이터 처리 방식 학습
- 실제 서버에 배포하며 웹 서비스 운영 흐름 경험

---

## 🔄 개선 방향

- 컴포넌트 기반 구조로 리팩토링 필요
- 보안 처리 (SQL Injection, 파일 업로드 검증 등) 강화 필요
- 반응형 UI 및 사용자 경험 개선
- Vue / React 기반 구조로 확장 가능

---

## 📎 기타

본 프로젝트는 웹 개발 초기 학습 과정에서 제작된 프로젝트로,  
이후 진행한 프로젝트(TONE, GOREON 등)를 통해 구조적 개선과 UX 완성도를 발전시켰습니다.
