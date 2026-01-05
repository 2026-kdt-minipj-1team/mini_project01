# mini_project01

## 🧩 Git 작업 규칙 (Team Workflow)

### 1️⃣ 레포지토리 클론
git clone https://github.com/2026-kdt-minipj-1team/mini_project01.git

### 2️⃣ 디렉토리 이동
cd mini_project01

### 3️⃣ 로컬 dev 브랜치 생성 (원격 origin/dev 기준)
git fetch origin                 # 원격 최신 브랜치 정보 가져오기
git switch -c dev origin/dev     # origin/dev 기준으로 로컬 dev 브랜치 생성

### 4️⃣ 개인 작업 브랜치 생성
git switch -c [작업종류]/[팀원명]-[작업내용]
ex)
git switch -c feature/lsg-login
git switch -c fix/lsg-session
git switch -c refactor/lsg-file-structure

### 5️⃣ 작업 완료 후 원격(GitHub)에 업로드 및 PR
git status                                 # 변경 사항 확인
git add -A or git add . or git add 작업파일 # 변경 사항 스테이징 (삭제/이동 포함)
git commit -m "feat: 자신이 작업한 내용"     # 커밋

원격에 팀원명으로 브랜치 생성 후 푸시
git push -u origin [작업의 종류]/[팀원명]-[작업내용] 
ex) git push -u origin feature/lsg-login

### 6️⃣ Pull Request(PR) 생성
GitHub에서 PR 생성 시 아래 기준을 반드시 지키기
base branch: dev
compare branch: feature/lsg-login (본인이 생성한 브랜치)

### 7️⃣ Merge 완료 후 브랜치 정리
PR이 정상적으로 머지되었고 문제가 없다면,
본인이 사용한 원격 브랜치는 삭제합니다.
(선택) 로컬 브랜치도 함께 삭제 가능