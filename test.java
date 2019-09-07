import java.awt.*;
import java.awt.event.*;
import java.awt.CardLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;


public class Test extends JFrame {
    private static final long serialVersionUID = 1L;
    JPanel loginDisp = new JPanel();
    JPanel homeDisp = new JPanel();
    JPasswordField password = new JPasswordField('*');
    public static void main(String args[]) {
        new Test();
    }

    public Test() {
        loginDisp.setVisible(true);
    }
    class LoginDisp extends JFrame {
        private static final long serialVersionUID = 1L;
        LoginDisp(){
            setContentPane(loginDisp);
            this.setBounds( 200, 200, 400, 400 );
            this.setTitle("FakeBook");
            JLabel text = new JLabel("pass");
            JButton buttonLogin = new JButton("画面Bへ移動");
            text.setSize(150, 20);
            password.setSize(150, 20);
            buttonLogin.setSize(200, 20);
            text.setLocation(50, 50);
            password.setLocation(50, 90);
            buttonLogin.setLocation(50, 200);
            ActionListener login = new Login();
            buttonLogin.addActionListener(login);
            addComponent(loginDisp, text, buttonLogin, password);
        }
    }


    public class Login extends JButton implements ActionListener {
        private static final long serialVersionUID = 1L;
        public Login() {
            super();
            this.addActionListener(this);
        }
		public void actionPerformed(ActionEvent evt) {
            String pass = new String(password.getPassword());
            if(pass.equals("0000")){
                homeDisp.setVisible(true);
            } else {
                JLabel error = new JLabel("パスワードが違います");
                JOptionPane.showMessageDialog(this, error, "失敗", JOptionPane.ERROR_MESSAGE);     
            }
		}
    }

    class HomeDisp extends JFrame {
        private static final long serialVersionUID = 1L;
        HomeDisp(){
            this.setVisible(true);
            this.setBounds( 200, 200, 400, 400 );
            homeDisp.setLayout( null );
            this.setTitle("FakeBook");
            this.setContentPane(homeDisp);
        }
    }
    void addComponent(JPanel panleName, Component... components){
        for(int i = 0; i < components.length; i++){
            panleName.add(components[i]);
        }
    }
}