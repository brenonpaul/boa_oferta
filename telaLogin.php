              <div id="id01" class="modal">
                <form class="modal-content animate">
                  <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>         
                    </div>
                  <div class="container">
                    <label for="uname"><b>Usuário</b></label>
                    <input type="text" placeholder="Nome de Usuário" name="uname" required class="form-control">
                    <label for="psw"><b>Senha</b></label>
                    <input type="password" placeholder="Senha" name="psw" required class="form-control">
                    <button type="submit" class="btn btn-primary" style="background-color: #4CAF50;">Entrar</button>
                    <label>
                      <input type="checkbox" checked="checked" name="remember"> lembrar senha
                    </label>
                  </div>
                  <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw"><a href="#">Esqueceu sua Senha?</a></span>
                  </div>
                </form>
              </div>