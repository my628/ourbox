# 配置你的ROS2环境

**目标** ：这个教程将向你演示如何去准备ROS2环境。

**教程等级** ：初学者

**用时** ：5分钟

**内容** ：

- ## 背景
    ROS2依赖于使用 shell 环境来组合工作区的概念。“工作区”是一个ROS术语，用来表示ROS2开发在你系统上的位置。
    核心的ROS2工作区称为底层。 后续的本地工作区称为叠加层。
    当进行ROS2开发时，你通常会有多个工作区同时处于激活状态。
    
    组合工作区可以更轻松地针对不同版本的ROS2或针对不同的软件包集进行开发。
    它还允许在同一台计算机上安装多个ROS2发行版(例如Dashing和Eloquent)并在它们之间进行切换。
    
    这是通过在每次打开新shell时获取安装文件，或通过将source命令添加到shell启动脚本一次来实现的。
    如果不获取安装文件，你将无法访问ROS2的命令，也无法找到或使用ROS2的包。 换句话说，你将无法使用ROS2。
    
- ## 先决条件
    在开始这些教程之前，请按照ROS2安装页面上的说明安装ROS2。
    
    本教程中使用的命令假设您遵循了操作系统的二进制包安装指南（Linux的Debian包）。
    如果你是从源代码构建的，你仍然可以继续，但你的安装文件的路径可能会有所不同。
    如果你是从源代码安装的，你也将无法使用```sudo apt install ros-<distro>-<package>```命令（在初学者级别的教程中经常使用）。
    
    如果你使用的是Linux或macOS，但还不熟悉shell，本教程将有所帮助。
    
- ## 任务
    1. 读取并执行setup文件中的shell命令
        你需要在新打开的每个shell上运行这个命令才能访问ROS2命令，如下所示：
        ```bash
        source /opt/ros/galactic/setup.bash
        ```
        > 确切的命令取决于您安装ROS2的位置。如果您遇到问题，请确保文件路径指向您的安装。

    2. 添加sourcing到你的shell启动脚本
        如果你不想在每次打开新shell时都获取安装文件的源代码（跳过任务1），那么你可以将此命令添加到你的shell启动脚本中：
        ```bash
        echo "source /opt/ros/galactic/setup.bash" >> ~/.bashrc
        ```
     
     3. 添加colcon_cd到你的shell启动脚本
         命令colcon_cd允许你快速将shell当前的工作目录更改为包目录。 
         例如colcon_cd some_ros_package会很快带你到目录~/ros2_install/src/some_ros_package。
         ```bash
         echo "source /usr/share/colcon_cd/function/colcon_cd.sh" >> ~/.bashrc
         echo "export _colcon_cd_root=~/ros2_install" >> ~/.bashrc
         ```
         根据你安装colcon_cd的方式和你的工作区所在的位置，上述说明可能会有所不同，请参阅文档了解更多详细信息。 
         要在Linux和macOS中撤消此操作，请找到系统shell的启动脚本并删除附加的source和export命令。
  
     4. 检查环境变量
         读取和执行ROS2安装文件中的shell命令将设置操作ROS2所需的几个必要的环境变量。 
         如果你在查找或使用ROS2包时遇到问题，请确保使用以下命令正确设置你的环境：
         ```bash
         printenv | grep -i ROS
         ```
         检查是否设置了ROS_DISTRO和ROS_VERSION等变量。
         ```bash
         ROS_VERSION=2
         ROS_PYTHON_VERSION=3
         ROS_DISTRO=galactic
         ```
         如果环境变量设置不正确，请返回你遵循的安装指南的ROS2包安装部分。 
         如果你需要更具体的帮助（因为环境设置文件可能来自不同的地方），你可以从社区获得答案。
         
         
 - ## 总结
    使用前需要正确配置ROS2开发环境。 
    这可以通过两种方式完成：在你新打开的每个shell中读并执行安装文件中的shell命令，或者将source命令添加到你的启动脚本中。

    如果你在ROS2中定位或使用包时遇到任何问题，你应该做的第一件事是检查你的环境变量并确保它们设置为你想要的版本和发行版。
    
- ## 下一步
    现在你已经安装了ROS2并且知道如何读取并执行其安装文件中的shell命令，你可以开始使用turtlesim工具学习ROS2的来龙去脉。



# 介绍turtlesim和rqt

**目标** ：安装并使用turtlesim包和rqt工具为即将到来的教程做准备。

**教程等级** ：初学者

**用时** ：15分钟

**内容** ：


- ## 背景
Turtlesim是一个用于学习ROS2的轻量级模拟器。它在最基本的层面上阐明了ROS2的作用，让你了解稍后将使用真实机器人或机器人模拟器来做什么。

rqt是ROS2的GUI工具。
在rqt中所做的一切都可以在命令行上完成，但它提供了一种更简单、更用户友好的方式来操纵ROS2的元件。

本教程涉及核心的ROS2概念，例如节点、主题和服务的分离。 
所有这些概念将在后面的教程中详细说明； 现在，您只需设置工具并感受一下它们。



- ## 先决条件
上一个教程，[配置你的ROS2环境]()，将向你展示如何设置你的环境。


- ## 任务

    1. ### 安装海龟模拟器
        与往常一样，首先在新终端中读取并执行设置文件中shell命令，如上一教程中所述。
        为你的ROS2发行版安装turtlesim包：
        ```bash
        sudo apt update
        sudo apt install ros-galactic-turtlesim
        ```
        检查是否安装了软件包：
        ```bash
        ros2 pkg executables turtlesim
        ```
        上面的命令应该返回一个turtlesim的可执行文件列表：
        ```
        turtlesim draw_square
        turtlesim mimic
        turtlesim turtle_teleop_key
        turtlesim turtlesim_node
        ```
    
    2. ### 启动海龟模拟器
        要启动海龟模拟器，请在终端中输入以下命令：
        ```
        ros2 run turtlesim turtlesim_node
        ```
        模拟器窗口应该出现，中间有一个随机的海龟。
        
        ![图片alt](http://docs.ros.org/en/galactic/_images/turtlesim.png)
        
        在命令下的终端中，你将看到来自节点的消息：
        ```
        [INFO] [turtlesim]: Starting turtlesim with node name /turtlesim
        [INFO] [turtlesim]: Spawning turtle [turtle1] at x=[5.544445], y=[5.544445], theta=[0.000000]
        ```
        
    3. ### 使用海龟模拟器
        
        打开一个新终端并再次获取ROS2。

        现在你将运行一个新节点来控制第一个节点中的海龟：
        
        ```bash
        ros2 run turtlesim turtle_teleop_key
        ```
        
        此时你应该打开三个窗口：一个运行turtlesim_node的终端，一个运行turtle_teleop_key的终端和turtlesim窗口。 
        排列这些窗口，以便您可以看到turtlesim窗口，同时还要使运行turtle_teleop_key 的终端处于活动状态，以便您可以在turtlesim 中控制海龟。
        
        使用键盘上的箭头键来控制乌龟。 它将在屏幕上移动，使用其附带的“笔”绘制到目前为止所遵循的路径。
        
        > 按箭头键只会使海龟移动一小段距离然后停止。 这是因为，实际上，如果操作员失去与机器人的连接，您不希望机器人继续执行指令。
        
        您可以使用 list 命令查看节点及其关联的服务、主题和操作：
        
        ```bash
        ros2 node list
        ros2 topic list
        ros2 service list
        ros2 action list
        ```

    4. ### 安装rqt
        
        打开一个新终端来安装rqt及其插件：
        
        ```bash
        sudo apt update
        sudo apt install ~nros-galactic-rqt*
        ```
        
        运行rqt
        
        ```bash
        rqt
        ```

    5. ### 使用rqt
    
        第一次运行rqt后，窗口将是空白的。
        不用担心; 只需从顶部的菜单栏中选择插件 > 服务 > 服务调用者。
        
        > rqt可能需要一些时间来定位所有插件本身。 
        > 如果你单击插件，但没有看到服务或任何其他选项，则应关闭rqt，在终端中输入命令 ```rqt --force-discover``` 。
        
        ![图片alt](http://docs.ros.org/en/galactic/_images/rqt.png)
        
        使用服务下拉列表左侧的刷新按钮确保您的海龟模拟器节点的所有服务都可用。

        单击服务下拉列表查看海龟模拟器的服务，然后选择/spawn服务。
        
        1. #### 尝试spawn服务
        
            让我们使用rqt来调用/spawn服务。 
            你可以从它的名字中猜出/spawn会在turtlesim窗口中创建另一只海龟。
            
            通过在表达式列中的空单引号之间双击，为新海龟指定一个唯一名称，例如turtle2。 
            可以看到，这个表达式对应的是名称值，并且是字符串类型。

            输入海龟生成的新坐标，例如 x = 1.0 和 y = 1.0。
            
            ![图片alt](http://docs.ros.org/en/galactic/_images/spawn1.png)
            
            > 如果你尝试生成与现有海龟同名的新海龟，例如默认的turtle1，那么你将在运行turtlesim_node的终端中收到一条错误消息：
            
            ```
            [ERROR] [turtlesim]: A turtle named [turtle1] already exists
            ```
            
            要生成turtle2，您必须通过单击rqt 窗口右上角的Call按钮来调用该服务。
            你将看到在你输入的x和y坐标处生成了一只新海龟（再次采用随机设计）。

            如果刷新rqt中的服务列表，你还会看到现在除了/turtle1/...之外，还有与新乌龟相关的服务，/turtle2/...。
            
        2. #### 尝试set_pen服务
            
            现在让我们使用/set_pen服务给turtle1一个独有的笔：
            
            ![图片alt](http://docs.ros.org/en/galactic/_images/set_pen.png)
            
            r、g和b的值在0到255之间，将设置海龟1笔绘制的颜色，width设置线条的粗细。

            要让海龟1绘制一条明显的红线，请将r的值更改为255，将width的值更改为5。不要忘记在更新值后调用服务。

            如果你回到运行turtle_teleop_node的终端，按方向键，你会看到海龟1的笔已经改变了。
            
            ![图片alt](http://docs.ros.org/en/galactic/_images/new_pen.png)
            
            你可能已经注意到无法移动海龟2。 
            你可以通过将海龟1的cmd_vel主题重新映射到海龟2来实现此目的。
            
  
    6. ### 重映射
    
        在一个新终端中，输入然后运行：
        
        ```bash
        ros2 run turtlesim turtle_teleop_key --ros-args --remap turtle1/cmd_vel:=turtle2/cmd_vel
        ```
        
        现在你可以在此终端处于活动状态时移动海龟2，并在运行turtle_teleop_key的另一个终端处于激活状态时移动海龟1。
        
        
    7. ### 关闭海龟模拟器

        要停止模拟，你可以在turtlesim_node终端中输入Ctrl + C，在teleop终端中输入q。
        

- ## 总结
    使用turtlesim和rqt是学习ROS 2核心概念的好方法。
    
- ## 下一步
    现在你已经启动并运行了海龟模拟器和rqt，并且了解了它们的工作原理，让我们在下一个教程[理解ROS2节点]()中深入探讨ROS2的第一个核心概念。
    
- ## 相关内容
    可以在ros_tutorials存储库中找到海龟模拟器的包。 
    确保调整分支以查看与你安装的ROS2发行版相对应的海龟模拟器版本。

    这个社区贡献的视频演示了本教程中涵盖的许多项目。
    
    
    

# 理解ROS2 nodes

**目标** ：学习ROS2中关于nodes的函数和与它们互动的工具。

**教程等级** ：初学者

**用时** ：10分钟

**内容** ：

- ## 背景
    1. ### ROS2图
    在接下来的的教程，你将学习关于构成所谓ROS2图的一系列核心概念。
    ROS2图是一个ROS2元素们同时处理数据的网络。
    它包含
    如果您要将   所有可执行文件和它们之间的联系绘制出来并进行可视化。
    
    2. ### Nodes in ROS2
    在ROS里每个node的用途,应该负责单一模块(列如一个node为控制轮电机，一个node为激光测距仪等等)。
    每个node能通过主题，服务，动作或参数向其它的node发送和接收数据。
    ![Alt Text](http://docs.ros.org/en/galactic/_images/Nodes-TopicandService.gif) 
    
    一个完整的机器人系统由很多协同工作的node所组成。
    在ROS2中，一个单一可执行文件(C++程序，python程序等等)能容纳一个或多个node。
    
- ## 先决条件
    前面的教程向你展示了如何安装和使用海龟模拟器这个包。

    与往常一样，不要忘记在你打开的每个新终端中读取和执行ROS2设置文件中的shell命令。
    
- ## 任务
    
    1. ROS2运行命令
        ros2 run命令从包中启动可执行文件。
        
        ```bash
        ros2 run <package_name> <executable_name>
        ```
        
        要运行海龟模拟器，请打开一个新终端，然后输入以下命令：
        
        ```bash
        ros2 run turtlesim turtlesim_node
        ```
        
        正如你在上一教程中看到的那样，海龟模拟器窗口将打开。

        这里，包名是turtlesim，可执行文件名是turtlesim_node。

        然而，我们仍然不知道节点名称。 
        你可以使用ros2节点列表查找节点名称。
        
    2. ROS2节点列表命令
    
        ```ros2 node list```将显示所有正在运行的节点的名称。 
        当你想与节点交互时，或者当你的系统运行许多节点并需要跟踪它们时，这尤其有用。

        当海龟模拟器仍在另一个终端中运行时，打开一个新终端然后输入以下命令：
        
        ```bash
        ros2 node list
        ```
        
        终端将返回节点名称：
        
        ```
        /turtlesim
        ```
        
        打开另一个新终端并使用以下命令启动Teleop节点：
        
        ```bash
        ros2 run turtlesim turtle_teleop_key
        ```
        
        在这里，我们再次搜索turtlesim包，这次是搜索名为```turtle_teleop_key```的可执行文件。

        返回你运行```ros2 node list```的终端并再次运行它。 
        你现在将看到两个活动节点的名称：
        
        ```
        /turtlesim
        /teleop_turtle
        ```
        
        1. #### 重映射

            重映射允许你将默认节点属性（如节点名称、主题名称、服务名称等）重新分配给自定义值。 
            在上一个教程中，你使用了```turtle_teleop_key```上的重映射来更改被控制的默认海龟。

            现在，让我们重新分配/turtlesim节点的名称。 
            在新终端中，运行以下命令：

            ```bash
            ros2 run turtlesim turtlesim_node --ros-args --remap __node:=my_turtle
            ```

            由于你再次在海龟模拟器上调用ros2 run，这将打开另一个海龟模拟器窗口。 
            但是，现在如果你返回运行```ros2 node list```的终端，再次运行它，你将看到三个节点名称：

            ```
            /my_turtle
            /turtlesim
            /teleop_turtle
            ```
            
          
    3. ### ROS2节点信息

        现在你知道节点的名称，你可以通过以下方式访问有关它们的更多信息：
        
        ```bash
        ros2 node info <node_name>
        ```
        
        要检查你的最新节点my_turtle，请运行以下命令：
        
        ```bash
        ros2 node info /my_turtle
        ```
        
        ```ros2 node info```返回与该节点交互的订阅者、发布者、服务和操作（ROS图连接）的列表。 
        输出应如下所示：
        
        ```
        /my_turtle
          Subscribers:
            /parameter_events: rcl_interfaces/msg/ParameterEvent
            /turtle1/cmd_vel: geometry_msgs/msg/Twist
          Publishers:
            /parameter_events: rcl_interfaces/msg/ParameterEvent
            /rosout: rcl_interfaces/msg/Log
            /turtle1/color_sensor: turtlesim/msg/Color
            /turtle1/pose: turtlesim/msg/Pose
          Service Servers:
            /clear: std_srvs/srv/Empty
            /kill: turtlesim/srv/Kill
            /my_turtle/describe_parameters: rcl_interfaces/srv/DescribeParameters
            /my_turtle/get_parameter_types: rcl_interfaces/srv/GetParameterTypes
            /my_turtle/get_parameters: rcl_interfaces/srv/GetParameters
            /my_turtle/list_parameters: rcl_interfaces/srv/ListParameters
            /my_turtle/set_parameters: rcl_interfaces/srv/SetParameters
            /my_turtle/set_parameters_atomically: rcl_interfaces/srv/SetParametersAtomically
            /reset: std_srvs/srv/Empty
            /spawn: turtlesim/srv/Spawn
            /turtle1/set_pen: turtlesim/srv/SetPen
            /turtle1/teleport_absolute: turtlesim/srv/TeleportAbsolute
            /turtle1/teleport_relative: turtlesim/srv/TeleportRelative
          Service Clients:

          Action Servers:
            /turtle1/rotate_absolute: turtlesim/action/RotateAbsolute
          Action Clients:
        ```

        现在尝试在/teleop_turtle节点上运行相同的命令，看看它的连接与my_turtle有何不同。

        在即将到来的教程中你将了解更多有关ROS图连接概念的信息，包括消息类型。

- ## 总结

    节点是一个基本的ROS2元素，在机器人系统中服务于单一的、模块化的目的。

    在本教程中，你通过运行可执行文件turtlesim_node和turtle_teleop_key来利用从turtlesim包创建的节点。

    你学习了如何使用```ros2 node list```来发现活动节点名称和```ros2 node info```以在单个节点上进行自检。 
    
    这些工具对于理解复杂的、真实的机器人系统中的数据流至关重要。
    
    
- ## 下一步

    现在你了解了ROS2中的节点，你可以继续学习主题教程。 
    
    主题是连接节点的通信类型之一。
    
    
- ## 相关内容 

    [概念]页为节点的概念加入了更多细节。
    
    
    
    
    
# 理解ROS2主题



**目标** ：使用rqt_graph和命令行工具来内检ROS2的主题。

**教程等级** ：初学者

**用时** ：20分钟

**内容** ：



- ## 背景

    ROS2将复杂系统分解为许多模块化节点。 
    主题是ROS图的重要元素，充当节点交换消息的总线。
    
    ![图片alt](http://docs.ros.org/en/galactic/_images/Topic-SinglePublisherandSingleSubscriber.gif)
    
    一个节点可以向任意数量的主题发布数据并同时订阅任意数量的主题。
    
    ![图片alt](http://docs.ros.org/en/galactic/_images/Topic-MultiplePublisherandMultipleSubscriber.gif)

    主题是数据在节点之间移动的主要方式之一，因此在系统的不同部分之间移动。
    
- ## 先决条件

    上一个教程提供了一些关于在此处构建的节点的有用背景信息。
    
    与往常一样，不要忘记在你打开的每个新终端中读取并执行ROS2设置文件中的shell命令。
    

- ## 任务

    1. ### 设置

        到现在为止，你应该可以轻松启动海龟模拟器了。

        打开一个新终端并运行：
        
        ```bash
        ros2 run turtlesim turtlesim_node
        ```

        打开另一个终端并运行：
        
        ```bash
        ros2 run turtlesim turtle_teleop_key
        ```
        
        回想一下之前的教程，这些节点的名称默认为/turtlesim和/teleop_turtle。
        
      
    2. ### rqt_graph

        在本教程中，我们将使用rqt_graph来可视化不断变化的节点和主题，以及它们之间的联系。

        [海龟模拟器教程]告诉你如何安装rqt及其所有插件，包括rqt_graph。

        要运行rqt_graph，请打开一个新终端并输入命令：
        
        ```bash
        rqt_graph
        ```
        
        你还可以通过打开rqt并选择Plugins>Introspection>Node Graph来打开rqt_graph。
        
        ![图片alt](http://docs.ros.org/en/galactic/_images/rqt_graph.png)
        
        你应该会看到上面的节点和主题，以及围绕图外围的两个动作（让我们暂时忽略它们）。 
        
        如果你将鼠标悬停在中心的主题上，你将看到如上图所示的颜色突出显示。

        该图描绘了/turtlesim节点和/teleop_turtle节点如何通过主题相互通信。 
        /teleop_turtle节点正在向/turtle1/cmd_vel主题发布数据（你输入的用于移动海龟的按键），/turtlesim节点订阅该主题以接收数据。

        rqt_graph的突出显示功能在检查具有以多种不同方式连接的许多节点和主题的更复杂系统时非常有用。
        
        rqt_graph是一个图形化自检工具。 
        现在我们将看看一些用于自检主题的命令行工具。
        
        
        
    3. ### ros2主题列表

        在新终端中运行```ros2 topic list```命令将返回系统中当前活动的所有主题的列表：
        
        ```
        /parameter_events
        /rosout
        /turtle1/cmd_vel
        /turtle1/color_sensor
        /turtle1/pose
        ```
        
        ```ros2 topic list -t```将返回相同的主题列表，这次将主题类型附加在括号中：
        
        ```
        /parameter_events [rcl_interfaces/msg/ParameterEvent]
        /rosout [rcl_interfaces/msg/Log]
        /turtle1/cmd_vel [geometry_msgs/msg/Twist]
        /turtle1/color_sensor [turtlesim/msg/Color]
        /turtle1/pose [turtlesim/msg/Pose]
        ```
        
        这些属性，尤其是类型，是节点如何知道他们在讨论相同的信息，因为它在主题上移动。

        如果你想知道rqt_graph中所有这些主题的位置，你可以取消选中隐藏下的所有框：
        
        ![image alt](http://docs.ros.org/en/galactic/_images/unhide.png)
        
        不过，就目前而言，请选中这些选项以避免混淆。
        
        
        
    4. ### ROS2主题应答

        要查看关于某个主题发布的数据，请使用：
        
        ```bash
        ros2 topic echo <topic_name>
        ```
        
        由于我们知道/teleop_turtle通过/turtle1/cmd_vel主题将数据发布到/turtlesim，让我们使用echo来自省该主题：
        
        ```bash
        ros2 topic echo /turtle1/cmd_vel
        ```
        
        起初，这个命令不会返回任何数据。 
        那是因为它在等待/teleop_turtle发布一些东西。

        返回到运行turtle_teleop_key的终端并使用箭头移动海龟。 
        观察你运行echo的终端，你将看到为你所做的每一个动作发布的位置数据：

        ```
        linear:
          x: 2.0
          y: 0.0
          z: 0.0
        angular:
          x: 0.0
          y: 0.0
          z: 0.0
          ---
        ```
        
        现在返回到rqt_graph并取消选中调试框。
        
        ![图片alt](http://docs.ros.org/en/galactic/_images/debug.png)
        
        /_ros2cli_26646是我们刚刚运行的 echo 创建的节点（数字可能不同）。 
        现在可以看到发布者正在通过cmd_vel主题发布数据，并且有两个订阅者订阅了。
        
        

    5. ### ROS2主题信息

        话题不只是点对点的通讯；它可以是一对多、多对一或多对多。

        另一种看待它的方法是运行：
        
        ```bash
        ros2 topic info /turtle1/cmd_vel
        ```
        
        将返回：
        
        ```
        Type: geometry_msgs/msg/Twist
        Publisher count: 1
        Subscription count: 2
        ```
        
        
        
    6. ### ROS2接口展示

        节点使用消息在主题上发送数据。 
        发布者和订阅者必须发送和接收相同类型的消息才能进行通信。

        我们之前在运行```ros2 topic list -t```后看到的主题类型让我们知道每个主题使用的消息类型。 
        回想一下cmd_vel主题的类型：
        
        ```
        geometry_msgs/msg/Twist
        ```
        
        这意味着在包geometry_msgs中有一个名为Twist的msg。

        现在我们可以在这个类型上运行```ros2 interface show <msg type>```来了解它的细节，特别是消息预设的数据结构。
        
        ```bash
        ros2 interface show geometry_msgs/msg/Twist
        ```
        
        对于上面的消息类型，它产生：
        
        ```
        #This expresses velocity in free space broken into its linear and angular parts.

        Vector3  linear
                float64 x
                float64 y
                float64 z
        Vector3  angular
                float64 x
                float64 y
                float64 z
        ```
        
        这告诉你/turtlesim节点需要一条消息，其中包含两个向量（线性和角度），每个向量包含三个元素。 
        如果你回忆一下我们看到/teleop_turtle使用echo命令传递给/turtlesim 的数据，它的结构相同：
        
        ```
        linear:
          x: 2.0
          y: 0.0
          z: 0.0
        angular:
          x: 0.0
          y: 0.0
          z: 0.0
          ---
        ```
        
        
    7. ### ROS2主题发布

        现在你有了消息结构，你可以使用以下命令直接从命令行将数据发布到主题上：
        
        ```bash
        ros2 topic pub <topic_name> <msg_type> '<args>'
        ```
        
        ```<args>```参数是你将传递给主题的实际数据，在你刚刚在上一节中发现的结构中。

        需要注意的是，此参数需要以YAML语法输入。 
        像这样输入完整的命令：
        
        ```bash
        ros2 topic pub --once /turtle1/cmd_vel geometry_msgs/msg/Twist "{linear: {x: 2.0, y: 0.0, z: 0.0}, angular: {x: 0.0, y: 0.0, z: 1.8}}"
        ```
        
        ```--once```是一个可选参数，意思是“发布一条消息然后退出”。

        你将在终端中收到以下消息：
        
        ```
        publisher: beginning loop
        publishing #1: geometry_msgs.msg.Twist(linear=geometry_msgs.msg.Vector3(x=2.0, y=0.0, z=0.0), angular=geometry_msgs.msg.Vector3(x=0.0, y=0.0, z=1.8))
        ```
        
        你会看到你的乌龟像这样移动：
        
        ![图像alt](http://docs.ros.org/en/galactic/_images/pub_once.png)
        
        海龟（通常是它要模拟的真实机器人）需要稳定的命令流才能连续运行。 
        所以，为了让海龟继续移动，你可以运行：
        
        ```bash
        ros2 topic pub --rate 1 /turtle1/cmd_vel geometry_msgs/msg/Twist "{linear: {x: 2.0, y: 0.0, z: 0.0}, angular: {x: 0.0, y: 0.0, z: 1.8}}"
        ```
        
        你可以刷新rqt_graph以图形方式查看发生的情况。 
        你将看到ros2主题发布... 节点 (/_ros2cli_30358)正在/turtle1/cmd_vel主题上发布，并且现在正在被ros2主题应答...节点 (/_ros2cli_26646)和/turtlesim节点接收 。
        
        ![图片alt](http://docs.ros.org/en/galactic/_images/rqt_graph2.png)
        
        最后，你可以在```pose```主题上运行```echo```并重新检查rqt_graph：
        
        ```bash
        ros2 topic echo /turtle1/pose
        ```
        
        ![图片alt](http://docs.ros.org/en/galactic/_images/rqt_graph3.png)
        
        你可以看到/turtlesim节点也在发布新的```echo```节点订阅的```pose```主题。
        
        
        
    8. ### ROS2主题速度

        对于此过程的最后一次反思，你可以使用以下方法查看数据发布的速度：
        
        ```bash
        ros2 topic hz /turtle1/pose
        ```
        
        它将返回有关/turtlesim节点向```pose```主题发布数据的速率的数据。
        
        ```
        average rate: 59.354
        min: 0.005s max: 0.027s std dev: 0.00284s window: 58
        ```
        
        回想一下，你使用```ros2 topic pub --rate 1```将```turtle1/cmd_vel```的发布速率设置为稳定的1Hz。
        如果使用```turtle1/cmd_vel```而不是```turtle1/pose```运行上述命令，您将看到反映该速率的平均值。
        
        
         
    9. ### 清理
        此时，您将有很多节点在运行。 不要忘记通过在每个终端中输入 Ctrl+C 来停止它们。



- ## 总结
    节点通过主题发布信息，这允许任意数量的其他节点订阅和访问该信息。 
    在本教程中，你使用rqt_graph和命令行工具检查了多个节点之间关于主题的联系。
    你现在应该很好地了解数据如何在ROS2系统中移动。

- ## 下一步
    接下来，你将通过教程[理解ROS2服务]了解ROS图中的另一种通信类型。
