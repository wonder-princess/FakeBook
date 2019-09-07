import java.awt.*;
import java.awt.event.*;
import java.awt.CardLayout;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;


public class loginAfterChenge extends JFrame {
    private static final long serialVersionUID = 1L;
    public static void main(String args[]) {
        new loginAfterChenge();
    }

    private JPanel cardPanel;
    JPanel loginDisp = new JPanel();
    JPasswordField password = new JPasswordField('*');
    private static final String BEFOR = "befor";
    private static final String AFTER = "after";

    public loginAfterChenge() {
        setTitle("FakeBook");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        setSize(1280, 720);
        setLocationRelativeTo(null);

        cardPanel = new JPanel();
        cardPanel.setLayout(new CardLayout()); 

        //ログイン前
        JPanel home_beforLogin = home_beforLogin();
        cardPanel.add(home_beforLogin, BEFOR);

        //ログイン後
        JPanel home_afterLogin = home_afterLogin();
        cardPanel.add(home_afterLogin, AFTER);

        ((CardLayout)(cardPanel.getLayout())).show(cardPanel, BEFOR);

        getContentPane().add(cardPanel);
        setVisible(true);
        new LoginDisp();
    }

    private JPanel home_beforLogin() {
        JPanel panel = new JPanel(null);
        return panel;
    }

    private JPanel home_afterLogin() {
        JLabel title = new JLabel("ログイン成功");
        JPanel panel=new JPanel(null);
        title.setLayout(new BoxLayout(title, BoxLayout.PAGE_AXIS));
        title.setFont(new Font("ＭＳ ゴシック", Font.PLAIN, 60));
        title.setBounds(350, 100, 1600, 100);
        panel.add(title);
        return panel;
    }
    class LoginDisp extends JFrame {
        private static final long serialVersionUID = 1L;
        LoginDisp(){
            setVisible(true);
            setBounds(200, 200, 400, 400);
            setContentPane(loginDisp);
            setTitle("FakeBook");
            loginDisp.setLayout( null );
            JLabel text = new JLabel("パスワード");
            JButton buttonLogin = new JButton("ログイン");
            text.setBounds(50, 100, 100, 20);
            password.setBounds(50, 150, 100, 20);
            buttonLogin.setBounds(50, 200, 100, 20);
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
                ((CardLayout)(cardPanel.getLayout())).show(cardPanel, AFTER);
                loginDisp.setVisible(false);
            } else {
                JLabel error = new JLabel("パスワードが違います");
                JOptionPane.showMessageDialog(this, error, "失敗", JOptionPane.ERROR_MESSAGE);     
            }
		}
    }
    void addComponent(JPanel panleName, Component... components){
        for(int i = 0; i < components.length; i++){
            panleName.add(components[i]);
        }
    }
}